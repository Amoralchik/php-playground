# Book Review Application

This is a Book Review application built with Laravel. It allows users to review books, manage their reviews, and explore reviews from other users.

## Features

- User authentication and authorization
- Book management (CRUD operations)
- Review management (CRUD operations)
- User profile management
- Search functionality for books and reviews
- Responsive design

## Requirements

- PHP >= 7.4
- Composer
- Node.js & npm
- MySQL or any other supported database

## Installation

1. Clone the repository:

   ```sh
   git clone https://github.com/your-username/book-review.git
   cd book-review
   ```

2. Install dependencies:

   ```sh
   composer install
   npm install
   ```

3. Copy the file to `.env` and configure your environment variables:

   ```sh
   cp .env.example .env
   ```

4. Generate the application key:

   ```sh
   php artisan key:generate
   ```

5. Run the database migrations and seeders:

   ```sh
   php artisan migrate --seed
   ```

6. Build the front-end assets:

   ```sh
   npm run dev
   ```

7. Start the development server:
   ```sh
   php artisan serve
   ```

## Usage

- Visit `http://localhost:8000` in your browser to access the application.
- Register a new user or log in with existing credentials.
- Add, edit, or delete books and reviews.
- Explore reviews from other users.

## Testing

To run the tests, use the following command:

```sh
php artisan test
```

## Contributing

Thank you for considering contributing to the Book Review application! Please read the contribution guide for details on how to contribute.

## License

The Book Review application is open-sourced software licensed under the MIT license.

## Acknowledgements

- Laravel - The PHP framework used for this application.
- Tailwind CSS - The CSS framework used for styling.
- Vite - The build tool used for front-end assets.

## Security Vulnerabilities

If you discover a security vulnerability within this application, please send an e-mail to the repository owner. All security vulnerabilities will be promptly addressed.
