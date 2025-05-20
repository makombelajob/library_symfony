# 📚 Library Management Application – Symfony

This project is a web application built with **Symfony** to manage a library system including users, books, authors, and borrowing operations.

---

## 🧪 Project Goal

Develop a complete Symfony web application to:

- Manage a catalog of books and authors.
- Allow users to register and log in.
- Enable borrowing of books by users.
- Restrict administrative actions to authorized users.

---

## 🛠️ Technologies Used

- **Symfony 6.x**
- **PHP 8.x**
- **Doctrine ORM**
- **Twig**
- **Bootstrap 5**
- **MySQL**

---

## 🗃️ Database Design

The database was modeled using [DrawSQL](https://drawsql.app/teams/eedn/diagrams/library) and implemented using Doctrine ORM. Main entities:

- `User`
- `Book`
- `Author`
- `Loan`

---

## 🔧 Features

### 1. User Management
- Users can register and log in.
- Roles: `ROLE_USER` (default), `ROLE_ADMIN` (administration).
- Only logged-in users can borrow books.

### 2. Book Management
- Each book includes: Title, Publisher, Publication Date, ISBN.
- Many-to-Many relationship with authors.
- Full CRUD for books (admin-only).

### 3. Author Management
- Authors have a first name and last name.
- Many-to-Many relationship with books.
- CRUD operations (admin-only).

### 4. Book Borrowing
- Logged-in users can borrow available books.
- Borrowing saves the current date.
- Return date is automatically set to 14 days later.
- Users can mark books as returned.
- A book cannot be borrowed again until it is returned.

---

## 🔒 Security

- Borrowing and user-specific actions require authentication.
- Admin routes (book and author management) are protected with `ROLE_ADMIN`.
- Access controlled through Symfony’s security system.

---

## ✅ Deliverables

- Full Symfony project source code.
- Database generated using Doctrine entities.
- Functional user interface with:
    - Forms (Twig + Bootstrap)
    - Clear navigation
    - Flash messages for feedback

---

## ▶️ Installation

```bash
git clone https://github.com/makombelajob/library_symfony.git
cd library_symfony
composer install
cp .env .env.local
# database connection in .env.local
###> symfony/framework-bundle ###
APP_ENV=dev
APP_SECRET=a60d93bfa0164ceaa0a601cb5bf34f1a
###< symfony/framework-bundle ###

DATABASE_URL="mysql://username:user_passwd@database_service:3306/db_name?serverVersion=8.0"
# Configure your database in .env.local
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
symfony server:start
