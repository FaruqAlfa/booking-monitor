<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['driver', 'vehicle'])->get();
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('order', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::whereNotIn('id', function($query){
            $query->select('vehicle_id')
            ->from('orders')
            ->whereIn('status', ['pending', 'approved1', 'approved2']);
        })->get();

        return view('formOrder', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'driver_name' => 'required|string',
            'order_date' => 'required|date',
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        $driver = new Driver([
            'driver_name' => $request->input('driver_name'),
            'driver_phone' => $request->input('driver_phone'),
        ]);

        $driver->save();


        $vehicle = Vehicle::find($request->input('vehicle_id'));

        $order = new Order([
            'driver_id' => $driver->id,
            'vehicle_id' => $request->input('vehicle_id'),
            'order_date' => $request->input('order_date'),
            'end_date' => $request->input('end_date'),
            'status' => 'pending',
        ]);


        $log = new LogActivity([
            'user' => Auth::user()->name,
            'activity' => 'Admin Create Order '. $vehicle->vehicle_name . ' with ' . $driver->driver_name . ' on ' . $order->order_date . ' until ' . $order->end_date . ' with status ' . $order->status,
        ]);

        $order->save();
        $log->save();

        return redirect()->route('order');
    }


    public function approve(Order $order)
    {
        $vehicle = Vehicle::find($order->vehicle_id);
        $driver = Driver::find($order->driver_id);

        if (Auth::user()->role == 'approver1') {
            $order->status = 'approved1';
            $log = new LogActivity([
                'user' => Auth::user()->name,
                'activity' => 'Approver1 Approve Order '. $vehicle->vehicle_name . ' with ' . $driver->driver_name . ' on ' . $order->order_date . ' until ' . $order->end_date . ' with status ' . $order->status,
            ]);
            $log->save();
            $order->save();
        } else if (Auth::user()->role == 'approver2' && $order->status == 'approved1') {
            $order->status = 'approved2';
            $log = new LogActivity([
                'user' => Auth::user()->name,
                'activity' => 'Approver2 Approve Order '. $vehicle->vehicle_name . ' with ' . $driver->driver_name . ' on ' . $order->order_date . ' until ' . $order->end_date . ' with status ' . $order->status,
            ]);
            $log->save();
            $order->save();
        }

        return back();
    }

    public function reject(Order $order)
    {
        $vehicle = Vehicle::find($order->vehicle_id);
        $driver = Driver::find($order->driver_id);

        if (Auth::user()->role == 'approver1' && $order->status == 'pending') {
            $order->status = 'rejected';
            $log = new LogActivity([
                'user' => Auth::user()->name,
                'activity' => 'Approver1 Reject Order '. $vehicle->vehicle_name . ' with ' . $driver->driver_name . ' on ' . $order->order_date . ' until ' . $order->end_date . ' with status ' . $order->status,
            ]);
            $log->save();
            $order->save();
        } else if (Auth::user()->role == 'approver2' && $order->status == 'approved1') {
            $order->status = 'rejected';
            $log = new LogActivity([
                'user' => Auth::user()->name,
                'activity' => 'Approver2 Reject Order '. $vehicle->vehicle_name . ' with ' . $driver->driver_name . ' on ' . $order->order_date . ' until ' . $order->end_date . ' with status ' . $order->status,
            ]);
            $log->save();
            $order->save();
        }

        return back();
    }

    public function completed(Order $order)
    {
        $vehicle = Vehicle::find($order->vehicle_id);
        $driver = Driver::find($order->driver_id);

        $order->status = 'completed';
        $log = new LogActivity([
            'user' => Auth::user()->name,
            'activity' => 'Admin has Completed Order '. $vehicle->vehicle_name . ' with ' . $driver->driver_name . ' on ' . $order->order_date . ' until ' . $order->end_date . ' with status ' . $order->status,
        ]);
        $log->save();
        $order->push();

        return back();
    }

    public function export()
    {
        $date = date('Y-m-d'); // Get the current date
        $filename = 'Nickel-Vehicles-Monitor-Report-' . $date . '.xlsx';
        return Excel::download(new OrderExport, $filename);
    }

    public function showLogActivity()
    {
        $logs = LogActivity::all();
        $logs = LogActivity::orderBy('updated_at', 'desc')->get();
        return view('log-activity', compact('logs'));
    }

}
