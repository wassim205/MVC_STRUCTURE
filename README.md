# MVC Framework with PHP and Eloquent

A modern, lightweight MVC framework built with PHP and Eloquent ORM. This framework provides a flexible architecture for developing web applications, featuring robust route management, secure data validation, and built-in protection against common web attacks.

---

## Table of Contents

- [Features](#features)
- [Project Structure](#project-structure)
- [Core Classes](#core-classes)
- [Installation](#installation)
- [Usage](#usage)
- [Best Practices](#best-practices)
- [Contributing](#contributing)
- [Authors](#authors)

---

## Features

- **Route Management:** Custom router to handle application routes efficiently.
- **Eloquent ORM Integration:** Seamlessly interact with your database using Eloquent.
- **Secure Data Validation:** Robust validation of user input through the `Validator.php` class.
- **Enhanced Security:** Protects against SQL Injection, XSS, and CSRF attacks via the `Security.php` class.
- **User Authentication:** Built-in user authentication using the `Auth.php` class.
- **Session Management:** Manage user sessions effectively with the `Session.php` class.

---

## Project Structure

├── public/ # Public assets and entry point (index.php) ├── app/ # Core application files (controllers, models, views, and core classes) ├── config/ # Configuration files (config.php, routes.php) ├── logs/ # Application log files ├── vendor/ # Composer-managed dependencies ├── .env # Environment variables └── composer.json # Composer configuration file

ruby
Copier
Modifier

---

## Core Classes

- **Router (`Router.php`):** Manages all application routes.
- **Controller (`Controller.php`):** Base class for controllers.
- **Model (`Model.php`):** Base class for models.
- **View (`View.php`):** Base class for views.
- **Database (`Database.php`):** Handles database connections.
- **Authentication (`Auth.php`):** Manages user authentication.
- **Validator (`Validator.php`):** Securely validates user input.
- **Security (`Security.php`):** Provides protection against common web vulnerabilities.
- **Session (`Session.php`):** Manages user sessions.

---

## Installation

1. **Clone the Repository:**

   ```bash
   git clone <repository-url>
   cd <repository-directory>
Install Dependencies:

Use Composer to install the required dependencies:

bash
Copier
Modifier
composer install
Configure the Database:

Create a new database.
Update the database credentials in the config/config.php file.
Set Up Routes:

Define your application routes in the config/routes.php file.

Create Controllers and Views:

Add controllers in the app/controllers directory.
Create views in the app/views directory.
Usage
To run the application:

Using a Web Server: Point your web server to the public/ directory.
Direct Access: Open the public/index.php file in your web browser.
This will launch the application using the configured routes, controllers, and views.

Best Practices
Separation of Concerns: Keep your models, views, and controllers separate.
Security: Use the built-in security features to protect against SQL Injection, XSS, and CSRF.
Modularity: Components are designed to be modular and easily replaceable.
Autoloading: Composer handles dependency management and autoloading for optimal performance.
Contributing
Contributions are welcome! To contribute:

Fork the repository.
Create a new feature branch.
Make your changes.
Submit a pull request for review.
Authors
Wassim El Mourabit
