# PHP Catalog of Courses

## Project Overview
This project is a simple PHP application that serves as a catalog for various courses. Users can view a list of courses, see detailed information about each course, and filter courses by category.

## File Structure
```
php-catalogo-cursos
├── data
│   └── items.php
├── styles.css
├── index.php
├── details.php
├── README.md
├── filter.php
├── login.php
├── protected.php
└── functions.php
```

## Setup Instructions
1. **Clone the repository** or download the project files to your local machine.
2. **Ensure you have a local server** (like XAMPP, WAMP, or MAMP) running PHP.
3. **Place the project folder** in the server's root directory (e.g., `htdocs` for XAMPP).
4. **Access the application** by navigating to `http://localhost/php-catalogo-cursos/index.php` in your web browser.

## Features
- **Catalog of Courses**: Displays a list of courses with images, titles, and categories.
- **Course Details**: Each course has a dedicated page showing detailed information.
- **Filtering**: Users can filter courses by category (to be implemented in `filter.php`).
- **User Authentication**: A login system to restrict access to certain features (to be implemented in `login.php` and `protected.php`).

## Additional Information
- The project uses a simple array structure in `data/items.php` to manage course data.
- CSS styles are defined in `styles.css`, and Bootstrap can be included for responsive design.
- Auxiliary functions are stored in `functions.php` for reusability across the application.

## Future Enhancements
- Implement filtering functionality in `filter.php`.
- Add user authentication and session management in `login.php` and `protected.php`.
- Expand the course data structure to include more attributes as needed.