## About The Project

Aplikasi Web untuk monitoring kendaraan serta bila ingin menggunakan kendaraan, diwajibkan untuk melakukan order serta harus disetujui kepada masing masing pengelola.

## **Feature** 
* Login
* Monitoring Booking Order Kendaraan
* Pemesanan Kendaraan
* Persetujuan Pemesanan Kendaraan
* Export report order periodic dalam bentuk Excel
* Log Activity untuk setiap proses yang dilakukan (Hanya Admin)

## **How to Usage** 
1. Clone the repository

    ```git clone https://github.com/FaruqAlfa/booking-monitor.git```


2. Switch to the repo folder

    ```cd booking-monitor```


3. Install all the dependencies using composer

    ```composer install```

4. Copy the example env file and make the required configuration changes in the .env file

    ```cp .env.example .env```

5. Generate a new application key

    ``php artisan key:generate``

6. Run the database migrations

    ```php artisan migrate:fresh --seed```

7. Start run dev
    
    ```npm run dev```

8. Start the local development server

    ```php artisan serve```

<br>

## **Username & Password**



  #### ADMIN ACCOUNT
  ```admin@gmail.com```

  ```admin123```



  #### Approver 1 ACCOUNT
  ```approver1@gmail.com```

  ```approver1123```



#### Approver 2 ACCOUNT 
```approver2@gmail.com```

```approver2123```

<br>


## Database Version 

* MySQL 5.2.1

## PHP Version <a name="php-version"></a>

* PHP 8.2

## Framework Version 

* Laravel 10.0

## Physical Data Model & Activity Diagram 

* [Physical Data Model](public/pdm/pdm.jpg)
* [Activity Diagram](public/activity-diagram/activity-diagram.md)
