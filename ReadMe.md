# Laravel API Example

This is a simple example of a RESTful API built with Laravel. It provides endpoints to manage student records.

## Prerequisites

Before getting started, make sure you have the following installed:

- PHP (>= 7.4)
- Composer
- Laravel CLI

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your/repository.git
   cd repository-name

2. Install dependencies:

composer install

3. Copy .env.example to .env and configure your database:

cp .env.example .env
php artisan key:generate

4. Update .env with your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

5. Run migrations to create necessary tables:

php artisan migrate

6. Serve the application:

php artisan serve
The API will be available at http://localhost:8000.

# API Endpoints
##List of Endpoints
1. GET /api/students: Get all students
2. POST /api/students: Create a new student
3. PUT /api/students/{id}: Update a student by ID
4. DELETE /api/students/{id}: Delete a student by ID

# Example Usage
## Get All Students
curl http://localhost:8000/api/students

## Create a Student
curl -X POST http://localhost:8000/api/students \
-H "Content-Type: application/json" \
-d '{
  "name": "John Doe",
  "email": "john.doe@example.com",
  "phone": "1234567890"
}'

## Update a Student

curl -X PUT http://localhost:8000/api/students/1 \
-H "Content-Type: application/json" \
-d '{
  "name": "Jane Doe",
  "email": "jane.doe@example.com",
  "phone": "0987654321"
}'

## Delete a Student

curl -X DELETE http://localhost:8000/api/students/1
