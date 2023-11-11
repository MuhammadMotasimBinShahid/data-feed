<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Data Feed Processing Task

## Overview

This project involves creating a command-line program in Laravel to process a local XML file (`feed.xml`) and store its data in a database. The program is designed to be easily extendable, configurable, and capable of logging errors.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)
- [Logging](#logging)
- [Testing](#testing)
- [Troubleshooting](#troubleshooting)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/MuhammadMotasimBinShahid/data-feed.git

2. **Install Dependencies:**
   ```bash
   composer install

## Usage

1. **Running the Command:**
   ```bash
   php artisan xml:process {file : Path to the XML file in the main directory}

Replace {file} with the path to the XML file you want to process.

2. **Example:**
   ```bash
   php artisan xml:process feed.xml

## Configuration

1. **Database Configuration:**
   Database connection details can be configured in the config/database.php file.

## Logging

Errors and debugging messages are logged to `storage/logs/laravel.log`.

## Testing

1. **Run PHPUnit Tests:**
   ```bash
   php artisan test

2. **Test Case:**
   `XmlProcessCommandTest.php` contains a test case to ensure the command processes XML data and stores it in the database.

## Troubleshooting

If memory exhaustion errors occur during testing, consider increasing the PHP memory limit and optimizing your code.


## Contributing

1. Fork the repository.
2. Create a new branch.
3. Make your changes.
4. Submit a pull request.

   
## License

This project is licensed under the MIT License.
