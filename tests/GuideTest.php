<?php

namespace Vinelab\Country\Tests;
use Vinelab\Country\Guide;

class GuideTest extends TestCase
{

    public function test_get_country_abbreviation_from_string_name()
    {
        $guide = (new Guide($this->config))->abbreviation('Lebanon');
        $this->assertEquals('LB', $guide->abbreviation);
    }

    public function test_get_country_abbreviation_from_array_name()
    {
        $guide = (new Guide($this->config))->abbreviation('United Arab Emirates');
        $this->assertEquals('AE', $guide->abbreviation);
    }

    public function test_get_country_name_from_abbreviation()
    {
        $guide = (new Guide($this->config))->name('AE');
        $this->assertEquals(['UAE', 'United Arab Emirates'], $guide->name);
    }

    public function test_get_all_countries()
    {
        $guide = new Guide($this->config);
        $this->assertEquals($this->countries, $guide->all());
    }


}
