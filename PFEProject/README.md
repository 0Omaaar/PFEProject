# Online Marketplace for Buying and Selling Cars

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)

## Introduction

This a Laravel-based web application, designed to streamline the process of buying and selling cars online. It offers a user-friendly interface for both buyers and sellers, providing detailed information about cars, user reviews, and more.

## Features

- **User Authentication**: Secure login and registration system.
- **Car Listings**: Detailed listings with images, descriptions, and reviews.
- **Search and Filter**: Advanced search and filter options to find the perfect car.
- **User Profiles**: Manage your profile, listings, and favorites.
- **Admin Dashboard**: Manage users, listings, and site content.

## Installation

1. **Clone the Repository**

```bash
git clone https://github.com/0Omaaar/PFEProject.git
cd PFEProject
```

2. **Install Dependencies**

```bash
composer install
npm install
```

3. **Environment Setup**

Copy the `.env.example` file to `.env` and configure your database settings.

```bash
cp .env.example .env
```

4. **Generate Application Key**

```bash
php artisan key:generate
```

5. **Run Migrations**

```bash
php artisan migrate
```

6. **Compile Assets**

```bash
npm run dev
```

7. **Start the Server**

```bash
php artisan serve
```

## Usage

1. **Access the Application**

Open your browser and navigate to `http://localhost:8000`.

2. **Admin Dashboard**

Access the admin dashboard at `http://localhost:8000/admin`.


## Contributing

We welcome contributions from the community! If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit them (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.

Happy coding! 🚗💻