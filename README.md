# PHP and Bootstrap CRUD Application

This is a simple CRUD (Create, Read, Update, Delete) application implemented using PHP and Bootstrap. The application allows you to manage user information, including name, email, number, and address.

## Features

- **View Users:** Display a list of users with basic information.
- **Edit User:** Modify user details such as name, email, number, and address.
- **Update User:** Save changes made to the user information.
- **Validation:** Ensure that all required fields are filled in before updating user information.
- **Error and Success Messages:** Display messages for error and success scenarios.

## Technologies Used

- **PHP:** Server-side scripting language used for backend functionality.
- **Bootstrap:** Frontend framework for styling and layout.

## Setup Instructions

1. **Database Configuration:**
   - Create a MySQL database with the name "practice".
   - Update the database connection details in the PHP code (`edit.php`).

2. **Run the Application:**
   - Deploy the files to a web server (e.g., Apache, Nginx).
   - Open the application in a web browser.

3. **Usage:**
   - Navigate to the application to view and manage user information.

## Code Structure

- `edit.php`: PHP script for handling both GET and POST requests, including fetching and updating user information.
- `index.php`: Home page displaying a list of users and providing links to edit individual user details.

## How to Contribute

If you find any issues or have improvements to suggest, please feel free to open an issue or create a pull request.

Happy Coding!
