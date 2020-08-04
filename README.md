# FoodShala 
- **FoodShala is an online food ordering platform with the best restaurants in town and tastiest menu**
- **This project is hosted at http://foodshala.ramkrishnan.live**
- **FoodShala is developed using Laravel**

## Pre-requisites
To run the project locally, you need to have the following:
- **PHP** (v7.2+) - https://www.php.net/manual/en/install.php
- **Composer** - https://getcomposer.org/download/
- **Laravel** (v7.2.2+) - https://laravel.com/docs/7.x#installation
- **MySQL** - https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/

## Get the project

- **Clone the project**
<br>

`git clone https://github.com/ramkrishnan6/foodshala.git`

- **Change directory**
<br>

`cd foodshala`

## Setup Development Environment

- **Create a database in mysql** 
```
>mysql create database foodshala 
```

- **Install packages using composer**
<br>

`composer install`

- **Generate a `.env` file**
<br>

`cp .env-example .env`

- **Generate an app key**
<br>

`php artisan key:generate`

- **Link the local storage directory to public**
<br>

`php artisan storage:link`

<br>

### Make the following changes to your `.env` file:

- **Specify an admin email to receive notifications** 
```
ADMIN_EMAIL = 'youremail@gmail.com'
```

- **Configuration for database** (MySQL)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=foodshala
DB_USERNAME=root
DB_PASSWORD=password
```

- **Configure your EMAIL settings to be able to send mails** (following settings are specific to Gmail SMTP) 

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=youremail@gmail.com
MAIL_PASSWORD=yourpassword
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS='youremail@gmail.com'
MAIL_FROM_NAME="${APP_NAME}"
```

- **Configuration to queue jobs** (using database driver)
```
BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120
```
<br>

### Migrate Database and seed data

`php artisan migrate:fresh --seed`


## Run Laravel's Development server

`php artisan serve`


## Pages

- Home Page `/`

<br>

- Customer Dashboard - `/customer` - Customers only

<br>

- Restaurant Dashboard - `/restaurant` - Restaurants only

<br>

- Customer Register - `/customer/register`
- Restaurant Register - `/restaurant/register`

<br>

- Customer Login - `/customer/login`
- Restaurant Login - `/restaurant/login`

<br>

- List of all Menu Items Page - `/menu`
- Add Menu Item `/menu/add` - Restaurants only
- List of all restaurants serving a specific Menu Item - `/menu/<menu-item-slug>` 

- List of all Restaurants - `/restaurants`
- Information about a Restaurant's Menu Item - `/<restaurant-slug>/<menu-item-slug>/<id>` 
- Menu of a specific Restaurant - `/<restaurant-slug>`

- Customer Cart - `/cart` - Customers only 

## Available endpoints:
```
- GET  /

- GET /restaurant
- GET & POST /restaurant/login
- GET & POST /restaurant/register

- GET /customer
- GET & POST /customer/register
- GET & POST /customer/register

- GET /menu
- GET & POST /menu/add
- GET /<menu-item-slug>

- GET & POST /cart

- POST /checkout

- GET /restaurants

- GET /<restaurant-slug>/<menu-item-slug>/<id>

- GET /<restaurant-slug>

```

## Database Seed

### The following will get created upon database seeding
When you run `php artisan migrate:fresh --seed`

- **250 Customers** 
<br>

&nbsp;&nbsp; Email ID: c0@0, c2@2 .. c249@249 
<br> 

&nbsp;&nbsp; Password: password

- **150 Restaurants**
<br>

&nbsp;&nbsp; Email ID: r0@0, r2@2 .. r149@149 
<br> 

&nbsp;&nbsp; Password: password


- **130 Unique Menu Items**

- **7500 Restaurant Menu Items**
<br>

&nbsp;&nbsp; Each restaurant will have 50 items in their menu

- **1000 Orders**
<br>

&nbsp;&nbsp; Randomly belonging to 250 customers

- **5000 Order Details** 
<br>

&nbsp;&nbsp; 5 entries per order - denotes the number of items in that order

**PS: Seeding database can take a while, usually 2-3 minutes**


## Important Note

### Regaring Sending Email Notification

**Email notifications are sent in the following events:**

- New Customer Registers (to admin and customer) 

- New Restaurant Registers (to admin and restaurant)
 
- New Order is placed (to customer and concerned restaurants) 

- Feedback form is submitted (to admin only)

### Regarding Process Jobs
- All the emails are sent in the background without having the user wait

- This is achieved using queue jobs and Events, Listeners in Laravel

- You need to run a background process (queue worker) which will listen for any available jobs and perform the same in a queue

- This can be achieved by running: 
```
touch jobs/jobs.log
php artisan queue:work > jobs.jobs.log &
```

- This will create a new file `jobs.log` which will contain the log of the jobs performed by the queue worker

### Regarding 130 unique food items

- To generate 130 unique food items, I have made use of a Custom API, endpoints to which are as follows:

```
URL --> food-api.ramkrishnan.live

GET /food (get the list of all food items)
POST /api/food (post a new item)
```

- To make a POST request to my API, include 

```
Request Header --> Accept:application/json
Request Body (form-data) --> name:Pizza(or whatever you want to add)  
```

- Note that the API will return a JSON Error Response 422 if the food item already exists.




