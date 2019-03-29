<?php

namespace Vinelab\Country\Tests;

use Illuminate\Contracts\Config\Repository;
use Mockery;
use PHPUnit\Framework\TestCase;
use Vinelab\Country\Guide;

class GuideTest extends TestCase
{
    /**
     * @var array
     */
    protected $countries;

    /**
     * @var Repository|Mockery\MockInterface
     */
    private $config;

    protected function setUp()
    {
        parent::setUp();

        $this->countries = require __DIR__.'/../config/countries.php';
        $this->config = $this->getMockedConfig($this->countries);
    }

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

    /**
     * @param array $countries
     * @return Repository|Mockery\MockInterface
     */
    protected function getMockedConfig(array $countries)
    {
        $mConfig = Mockery::mock(Repository::class);
        $mConfig->shouldReceive('get')->once()
            ->with('countries')
            ->andReturn($countries);

        return $mConfig;
    }
}
