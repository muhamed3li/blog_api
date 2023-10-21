# Use the official PHP Apache image as the base image
FROM php:apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the contents of the current directory to the working directory in the container
COPY . .

# Expose port 80 and 443
EXPOSE 80
EXPOSE 443

# Database container
# Use the official MySQL 5.7 image as the base image for the database service
FROM mysql:5.7

# Set environment variables for MySQL
ENV MYSQL_ROOT_PASSWORD=password
ENV MYSQL_DATABASE=blog_api
ENV MYSQL_PASSWORD=password

# Create a volume for the MySQL data
VOLUME /var/lib/mysql

# Create a network to connect the database and phpmyadmin containers
FROM phpmyadmin

# Set the environment variables for phpMyAdmin
ENV PMA_HOST=db
ENV MYSQL_ROOT_PASSWORD=password

# Expose port 80 for phpMyAdmin
EXPOSE 80
