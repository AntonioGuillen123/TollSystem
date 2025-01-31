# 🛣️ Welcome to my Toll System 🚗
This project aims to develop a platform to efficiently manage toll stations and vehicle transit. 

The system provides an intuitive and functional interface along with a robust API that allows toll stations to generate tickets for passing vehicles. 

With this system, toll operators can ensure a smooth and organized toll collection process, improving efficiency and reducing delays in vehicle transit.

## Overview

The platform consists of the following views:

- **Index View**

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1738328832/screencapture-127-0-0-1-8000-2025-01-31-14_06_39_bdekam.png)


- **Toll View**
![image](https://res.cloudinary.com/dierpqujk/image/upload/v1738328863/screencapture-127-0-0-1-8000-toll-1-2025-01-31-14_07_21_f9sehy.png)

- **Vehicle View**
![image](https://res.cloudinary.com/dierpqujk/image/upload/v1738328864/screencapture-127-0-0-1-8000-vehicle-1-2025-01-31-14_07_31_t4aumt.png)

## 🛠️🚀 Tech Stack
- **Frameworks:** Laravel
- **Server:** Xampp, Apache, Nodejs
- **Database:** Mysql
- **Others:** Composer, Postman, JIRA

## 📊📁 DB Diagram
Below is a diagram of the database:
- **vehicle - vehicle_type:** One to many relationship. A vehicle_type can have many vehicles, but each vehicle belongs to only one vehicle_type.

- **vehicle - toll_station:** Many to many relationship. A toll_station can have many vehicles, and vehicle can have many toll_stations. This relationship is represented by toll_station_vehicle pivot table.

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1738324811/imagen_2025-01-31_130007794_cf3dpz.png)

## 🔧⚙️ Installation
- Clone repository
```
git clone https://github.com/AntonioGuillen123/TollSystem
```

- Install Composer dependencies

```
composer install
```
- Install Nodejs dependencies

```
npm install
```
- Duplicate .env.example file and rename to .env
- In this new .env, change the variables you need, but it is very important to uncomment the database connection lines that are these:
 
In DB_CONNECTION will come mysqlite, change it to the bd you use (in this case MySQL)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toll_system
DB_USERNAME=root
DB_PASSWORD=
```
 - Generate an App Key with this command 
```
php artisan key:generate 
```

- Execute migrations with seeders
```
php artisan migrate --seed
```

## ▶️💻 Run Locally
- How to run the Laravel server  
```
php artisan serve
```

- If you want to run all this in development environment run the following command  
```
npm run dev
```

- For production you should run the following command 
```
npm run build
```

## 🏃‍♂️🧪 Running Tests

To run test you should uncomment the following lines on the phpunit.xml file.

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1733829455/imagen_2024-12-10_121742908_b3mfqm.png)


With the following command we run the tests and we will also generate a coverage report

```bash
  php artisan test --coverage-html=coverage-report
```

If everything is correct, everything should be OK.

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1738276191/imagen_2025-01-30_232949592_nygmdx.png)


A folder called coverage-report will also have been generated with **100%** coverage.
![image](https://res.cloudinary.com/dierpqujk/image/upload/v1738276356/imagen_2025-01-30_233235336_wpks4s.png)

## 📡🌐 Toll System API
This API allows you to create a ticket at a requested toll with the vehicle of your choice.

### Toll Station Vehicle
#### Create a new toll ticket for a vehicle at a toll station

```http
POST /api/tollTicket/{id}

```
### 🔹Request

#### Path Parameters:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id`      | `integer` | **Required**. Toll Station Id     |

#### Header:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Accept`      | `string` | Must be **application/json**    |

#### Body: 

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `vehicle_id`    | `integer` | **Required.** Vehicle Id    |

### 🔹Response

- **Status Code:** 200, 404
- **Content Type:** application/json


## ✍️🙍 Author
- **Antonio Guillén:**  
[![GitHub](https://img.shields.io/badge/GitHub-Perfil-black?style=flat-square&logo=github)](https://github.com/AntonioGuillen123)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Perfil-blue?style=flat-square&logo=linkedin)](https://www.linkedin.com/in/antonio-guillen-garcia)
[![Correo](https://img.shields.io/badge/Email-Contacto-red?style=flat-square&logo=gmail)](mailto:antonioguillengarcia123@gmail.com)