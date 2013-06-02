## Country package for Laravel 4
Translates between country name and abbreviation and vise versa.

## Installation
Refer to [vinelab/country on packagist.org](https://packagist.org/search/?q=vinelab%2Fcountry) for composer installation instructions.

Edit **app.php** and add ```'Vinelab\Country\CountryServiceProvider',``` to the ```'providers'``` array.

It will automatically alias itself as **Country** so no need to aslias it in your **app.php** unless you would like to customize it. In that case edit your **'aliases'** in **app.php** adding ``` 'MyCountry'	  => 'Vinelab\Country\Facades\Guide',```

## Usage

```php
$countryName = Country::name('US'); // United States
$countryAbbreviation = Country::abbreviation('United States'); // US
```