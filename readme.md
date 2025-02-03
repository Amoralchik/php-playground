# PHP playground

Learning playground for php all-in-one

## Features

### Event Management System

- Create and manage events with ease
- Organize events by date and location
- Manage event participants and notifications
- Track event status and completion

### Task List

- Add, edit, and delete tasks
- Mark tasks as complete/incomplete
- Search and filter tasks by title or status
- Paginate task list for better navigation

### Book Review System

- Create and manage book reviews
- Rate books on a scale of 1-5 stars
- Leave detailed written reviews
- View average ratings per book
- Filter books based on ratings and categories

## Installation

To get started with the project, follow these steps:

1. Clone the repository:

```bash
git clone [your-repository-url].git
cd [project-name]
```

2. Install dependencies using Composer:

```bash
composer install
```

3. Set up your database:

```bash
cp .env.example .env
php artisan key:generate
```

4. Run the database migrations:

```bash
php artisan migrate:fresh --seed
```

5. Install and compile frontend assets:

```bash
npm install
npm run dev
```

## Usage

### Event Management Routes

- List all events: `/events`
- Create new event: `/events/create`
- Edit event: `/events/{event}/edit`
- View event details: `/events/{event}`

### Task List Routes

- View task list: `/tasks`
- Create new task: `/tasks/create`
- Toggle task completion: `/tasks/{task}/toggle-complete`
- Update task: `/tasks/{task}/edit`

### Book Review Routes

- View all books: `/books`
- View book details and reviews: `/books/{book}`
- Add review to book: `/books/{book}/reviews/create`

## Key Features

- **Task Management**:

  - CRUD operations for tasks
  - Toggle task completion status
  - Responsive pagination

- **Book Reviews**:
  - Create, read, update reviews
  - Rate books and view ratings
  - Display average ratings
  - Cache invalidation on review changes

## License

The project is open-sourced under the MIT license.

## Acknowledgments

Special thanks to:

- The Laravel community for providing excellent frameworks and documentation
