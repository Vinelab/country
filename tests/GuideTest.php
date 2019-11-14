<?php

namespace Vinelab\Country\Tests;
use Vinelab\Country\Guide;

class GuideTest extends TestCase
{

    public function test_get_country_abbreviation_from_string_name()
    {
        $guide = new Guide($this->config);
        $this->assertEquals('LB', $guide->abbreviation('Lebanon'));
    }

    public function test_get_country_abbreviation_from_array_name()
    {
        $guide = new Guide($this->config);
        $this->assertEquals('AE', $guide->abbreviation('United Arab Emirates'));
    }

    public function test_get_country_name_from_abbreviation()
    {
        $guide = new Guide($this->config);
        $this->assertEquals(['UAE', 'United Arab Emirates'], $guide->name('AE'));
    }

    public function test_get_all_countries()
    {
        $guide = new Guide($this->config);
        $this->assertEquals($this->countries, $guide->all());
    }


}
