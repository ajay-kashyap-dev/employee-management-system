# Employee Management System

A simple Employee Management System built with Laravel to manage employee records, authentication, and database operations efficiently.

---

## 🚀 Project Setup Guide

Follow the steps below to set up the project locally:

### 1. Extract Project

Unzip the project files into your desired directory.

### 2. Configure Environment

Update the `.env` file with your database credentials:

```
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

### 3. Install Dependencies

Open terminal and navigate to the project folder:

```
composer install
```

---

### 4. Run Migrations

Create database tables:

```
php artisan migrate
```

---

### 5. Seed Database

Populate initial data (Admin + Employees):

```
php artisan db:seed
```

---

### 6. Run Application

```
php artisan serve
```

---

## 🔐 Administrator Login

Use the following credentials to log in:

* **Email:** [admin@gmail.com](mailto:admin@gmail.com)
* **Password:** admin@#123

---

## 🧪 Generate Dummy Employee Data

You can generate bulk employee records using Laravel Tinker:

```
php artisan tinker
```

Then run:

```
Employees::factory()->count(100)->create();
```

---

## 🛠️ Tech Stack

* Laravel (PHP Framework)
* MySQL Database
* Composer

---

## 📌 Features

* Employee CRUD Operations
* Admin Authentication
* Database Seeding
* Factory-based Dummy Data Generation

---

## 👨‍💻 Author

Ajay Kashyap
Full Stack Developer (PHP | Node.js | Angular | AWS)

---
