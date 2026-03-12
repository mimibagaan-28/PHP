# CRUD System - PHP MVC Application

A comprehensive PHP web application built with MVC architecture, featuring user authentication and faculty management with full CRUD functionality.

## Features

### User Management
- **Registration**: Users can register with personal details including:
  - First Name, Middle Name, Last Name
  - Age, Gender, Email, Address, Contact Number
  - Password with secure hashing
- **Login**: Secure authentication with session management
- **Forgot Password**: Password recovery functionality
- **Input Validation**: Comprehensive validation for all fields

### Faculty Management (Requires Login)
- **Create**: Add new faculty members with complete details
- **Read**: View all faculty members in a responsive table
- **Update**: Edit existing faculty information
- **Delete**: Remove faculty records with confirmation
- **Fields**: First Name, Middle Name, Last Name, Age, Gender, Address, Position, Salary

### Technical Features
- **MVC Architecture**: Clean separation of concerns
- **Database Connectivity**: MySQL with prepared statements
- **Security**: SQL injection prevention, XSS protection, password hashing
- **Responsive Design**: Modern CSS with gradient backgrounds and animations
- **Session Management**: Secure user sessions
- **Error Handling**: Comprehensive error messages and validation

## Installation

### Prerequisites
- XAMPP or similar PHP/MySQL environment
- PHP 7.4 or higher
- MySQL 5.7 or higher

### Setup Instructions

1. **Extract/Clone** the project to `c:\xampp\htdocs\CRUD\`

2. **Start XAMPP**:
   - Start Apache server
   - Start MySQL service

3. **Create Database**:
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `crud_system`

4. **Run Database Setup**:
   - Open your browser and navigate to: `http://localhost/CRUD/setup_database.php`
   - This will create the necessary tables automatically

5. **Access the Application**:
   - Home Page: `http://localhost/CRUD/`
   - Register: `http://localhost/CRUD/index.php?page=register`
   - Login: `http://localhost/CRUD/index.php?page=login`

## Project Structure

```
CRUD/
├── config/
│   └── database.php          # Database configuration and connection
├── controllers/
│   ├── UserController.php     # User authentication and management
│   └── FacultyController.php  # Faculty CRUD operations
├── models/
│   ├── User.php              # User model with database operations
│   └── Faculty.php           # Faculty model with database operations
├── views/
│   ├── header.php            # Common header with navigation
│   ├── footer.php            # Common footer
│   ├── home.php              # Dashboard/home page
│   ├── register.php          # User registration form
│   ├── login.php             # User login form
│   ├── forgot_password.php   # Password recovery form
│   └── faculty.php           # Faculty management interface
├── assets/
│   └── css/
│       └── style.css         # Custom CSS styling
├── index.php                 # Main entry point with routing
├── setup_database.php        # Database initialization script
└── README.md                 # This file
```

## Database Schema

### Users Table
- `id` (Primary Key, Auto-increment)
- `first_name` (VARCHAR, 50)
- `middle_name` (VARCHAR, 50)
- `last_name` (VARCHAR, 50)
- `age` (INT)
- `gender` (ENUM: Male, Female, Other)
- `email` (VARCHAR, 100, Unique)
- `address` (TEXT)
- `contact_number` (VARCHAR, 20)
- `password` (VARCHAR, 255 - Hashed)
- `created_at` (TIMESTAMP)

### Faculty Table
- `id` (Primary Key, Auto-increment)
- `first_name` (VARCHAR, 50)
- `middle_name` (VARCHAR, 50)
- `last_name` (VARCHAR, 50)
- `age` (INT)
- `gender` (ENUM: Male, Female, Other)
- `address` (TEXT)
- `position` (VARCHAR, 100)
- `salary` (DECIMAL, 10,2)
- `created_at` (TIMESTAMP)
- `updated_at` (TIMESTAMP)

## Usage

### For Users
1. **Register**: Create a new account with your personal details
2. **Login**: Access the system with your credentials
3. **View Dashboard**: See statistics and user lists
4. **Manage Faculty**: (After login) Add, edit, and delete faculty records

### For Administrators
- All user functionality plus:
- Complete CRUD operations for faculty management
- View comprehensive faculty lists with sorting
- Edit individual faculty records
- Delete faculty members with confirmation

## Security Features

- **Password Hashing**: Uses PHP's `password_hash()` with bcrypt
- **SQL Injection Prevention**: All queries use prepared statements
- **XSS Protection**: Input sanitization with `htmlspecialchars()`
- **Session Security**: Secure session management
- **Input Validation**: Server-side validation for all form inputs

## Styling

The application features:
- Modern gradient backgrounds
- Responsive card-based layouts
- Smooth animations and transitions
- Professional color scheme
- Mobile-responsive design
- Custom CSS framework (no external dependencies)

## Browser Compatibility

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

## Troubleshooting

### Common Issues

1. **Database Connection Error**:
   - Ensure XAMPP MySQL service is running
   - Verify database `crud_system` exists
   - Check database credentials in `config/database.php`

2. **404 Errors**:
   - Ensure project is in correct directory (`c:\xampp\htdocs\CRUD\`)
   - Check Apache is running on port 80

3. **Permission Issues**:
   - Ensure XAMPP has proper write permissions
   - Check file permissions are set correctly

### Support

For issues or questions:
1. Check the troubleshooting section above
2. Verify all setup steps were completed correctly
3. Ensure all prerequisites are met

## License

This project is for educational purposes. Feel free to modify and use according to your needs.
