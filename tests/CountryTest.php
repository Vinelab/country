<?php


namespace Vinelab\Country\Tests;


use Vinelab\Country\Facades\Country;
use Vinelab\Country\Guide;

class CountryTest extends TestCase {

    public function test_country_has_name()
    {
        $country = (new Guide($this->config))->name('LB');
        $this->assertEquals('Lebanon', $country->name);
    }

    public function test_country_has_abbreviation()
    {
        $country = (new Guide($this->config))->name('LB');
        $this->assertEquals('LB', $country->abbreviation);
    }

    public function test_abbreviation_method_returns_county_object()
    {
        $country = (new Guide($this->config))->abbreviation('Lebanon');
        $this->assertEquals('LB', $country->abbreviation);
        $this->assertEquals('Lebanon', $country->name);
    }

    public function test_it_returns_first_country_name_if_the_name_is_array(){
        $country = (new Guide($this->config))->name('AE');
        $this->assertEquals(['UAE', 'United Arab Emirates'], $country->name);
    }
}