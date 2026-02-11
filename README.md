# 🚀 Sales Flow

A clean and practical Laravel-based sales and inventory management system designed to demonstrate real-world backend architecture, business logic thinking, and clean Laravel development practices.

---

## 📌 Project Overview

Sales Flow is a lightweight sales management application built with Laravel, focusing on:

- Product management
- Customer management
- Sales tracking
- Archive system instead of hard deletion (real-world business approach)
- Clean CRUD operations with validation and structured logic

This project was developed as part of my journey toward becoming a professional Laravel Backend Developer, focusing on writing maintainable and structured code.

---

## ✨ Key Features

✅ Products management  
✅ Customers management  
✅ Sales recording and tracking  
✅ Archive/Activate system (instead of delete)  
✅ Pagination for better UX  
✅ Clean Form Request validation  
✅ Organized Controllers and Models  
✅ Bootstrap-based UI

---

## 🖼️ Screenshots

### 📷 Dashboard
![Dashboard](public/readme/dashboard.png)

### 📷 Products
![Products](public/readme/products.png)

### 📷 Sales
![Sales](public/readme/sales.png)

---

## 🛠️ Tech Stack

- Laravel
- PHP
- Blade Templates
- Bootstrap
- MySQL / MariaDB

---

## ⚙️ Installation

Clone the repository:

```bash
git clone https://github.com/amerHariri/sales-flow.git
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve


## 🧠 Design Philosophy

Instead of deleting records permanently, the system uses an archive mechanism to simulate real business workflows where historical data must be preserved.

The project focuses on:

- clean code structure
- readability
- separation of concerns
- practical backend thinking

---

## 🎯 Learning Goals

This project helped strengthen:

- Laravel MVC structure
- Form Requests validation
- Resource controllers
- Business logic handling
- Database relationships

---

## 👨‍💻 Author

Amer Hariri  
Junior Laravel Backend Developer

---

## ⭐ Future Improvements

- Authorization policies
- Advanced filtering & search
- API version
- Role-based permissions
