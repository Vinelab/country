## Country package for Laravel 5

Translates between country name and abbreviation and vise versa.

## Installation

```
composer require vinelab/country
```

## Publish Config File
```
php artisan vendor:publish --provider="Vinelab\Country\CountryServiceProvider"
```

## Usage

```php
$countryName = Country::name('US'); // United States
$countryAbbreviation = Country::abbreviation('United States'); // US
```
