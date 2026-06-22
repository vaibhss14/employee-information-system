# Employee Information System

## Project Overview

Employee Information System is a web-based HRMS application developed using Laravel, Livewire, Filament, Tailwind CSS, and MySQL. The system helps manage employees, departments, attendance records, and leave requests through a role-based access control system.

## Features

### Authentication

* User Login
* User Logout
* Session Management

### Role-Based Access Control

* Admin
* Employee

### Employee Management

* Add Employee
* View Employee
* Edit Employee
* Delete Employee
* Auto Employee Code Generation

### Department Management

* Add Department
* Edit Department
* Delete Department
* View Department List

### Attendance Management

* Mark Attendance
* View Attendance Records
* Update Attendance Status

### Leave Management

* Apply Leave
* Approve Leave
* Reject Leave
* Track Leave Status

### Dashboard

* Total Employees
* Total Departments
* Total Attendance Records
* Total Leave Requests
* Quick Access Navigation

### Admin Panel

* Built using Filament
* CRUD Operations
* Filters
* Actions
* Role-Based Access

## Database Relationships

* Department hasMany Employees
* Employee belongsTo Department
* Employee hasMany Leaves
* Employee hasMany Attendance Records

## Installation

```bash
git clone <repository-url>

composer install

npm install

cp .env.example .env

php artisan key:generate

php artisan migrate

npm run build

php artisan serve
```

## Author

**Vaibhavi Bendre**
