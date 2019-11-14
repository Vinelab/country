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
}