# Blog API Project

A simple CRUD API for a blog project developed as part of the assessment for the Back-End Developer position at Engaz CRM.

## Table of Contents

- [Project Overview](#project-overview)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Testing with Postman](#testing-with-postman)

## Project Overview

This project is a simple CRUD API for managing articles in a blog. It includes authentication and provides endpoints for creating, updating, retrieving, and deleting articles. The API follows REST principles and adheres to certain standards.

## Installation

Follow these steps to set up and run the project on your local machine:

1. **Prerequisites**:

   - GIT (Git version control system)
   - Docker (for containerization)
   - Postman (for testing the API)

2. **Clone the Repository**:

   ```bash
   git clone https://github.com/muhamed3li/blog_api.git
   cd blog_api
   ```

3. **Running the Application with Docker**:

   To run the application in a Docker container:

   ```bash
   docker-compose up
   ```

   This command will set up the necessary containers and start the application. You can access the API at `http://localhost:your-port`.

4. **Environment Variables**:

   Set up the following environment variables for the application:

   - `DB_HOST`: Database host
   - `DB_PORT`: Database port
   - `DB_DATABASE`: Database name
   - `DB_USERNAME`: Database username
   - `DB_PASSWORD`: Database password
5. Obtaining a JWT Token:

  To interact with authenticated endpoints, you need a JWT token. You can obtain a token by using the login endpoint:
  
  POST /api/login - Send a POST request with the following credentials to this endpoint:
  username: admin
  password: 123
  Upon a successful login, the endpoint will return a JWT token.
  
6. **API Documentation**:

   The API documentation is available in the [Postman Collection](#testing-with-postman).

7. **Testing and Documentation**:

   Make sure to provide clear and concise documentation in the `README.md` file. Use Markdown to describe the project, its purpose, and how to use it.

## Usage

- Use this section to provide additional information on how to use the project.

## API Endpoints

Here are the main API endpoints provided by this project:

- `GET /api/articles` - Retrieve all articles (public access)
- `GET /api/articles/{id}` - Retrieve a single article (public access)
- `POST /api/articles` - Create a new article (authenticated users only)
- `PUT /api/articles/{id}` - Update an existing article (authenticated users only)
- `DELETE /api/articles/{id}` - Delete an article (authenticated users only)

## Testing with Postman

You can use the provided Postman collection to test the API endpoints. The collection includes requests for each API endpoint and variables for URL, username, password, and token.

1. Import the Postman Collection from `blog_api_collection.json`.

2. Set the environment variables:
   - `url`: Set the base URL of your API (e.g., `http://localhost:your-port`).
   - `username`: Set the username for authentication.
   - `password`: Set the password for authentication.
   - `id`: Set the article ID for specific requests.
   - `token`: Login Set the JWT token for authentication.

3. Execute the requests to test the API endpoints.

Feel free to customize this template to fit your specific project needs. The README provides clear instructions for installation, usage, API endpoints, and testing with Postman.
