<?php


namespace Vinelab\Country\Tests;
use Illuminate\Contracts\Config\Repository;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Mockery;
class TestCase extends BaseTestCase{

    /**
     * @var array
     */
    protected $countries;

    /**
     * @var Repository|Mockery\MockInterface
     */
    protected $config;

    protected function setUp()
    {
        parent::setUp();

        $this->countries = require __DIR__.'/../config/countries.php';
        $this->config = $this->getMockedConfig($this->countries);
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