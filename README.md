## Country package for Laravel 4 & 5
Translates between country name and abbreviation and vise versa.

## Installation

```
composer update vinelab/country
```

## Publish Config File
```
php artisan vendor:publish
```

## Usage

```php
$countryName = Country::name('US'); // United States
$countryAbbreviation = Country::abbreviation('United States'); // US
```

> No tests provided with this package as it is a bit tricky to test at this point...