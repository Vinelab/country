<?php

namespace Vinelab\Country;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Arr;

class Guide
{
    /**
     * @var Repository
     */
    private $config;

    /**
     * Guide constructor.
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $abbreviation
     * @return string|array
     */
    public function name(string $abbreviation)
    {
        $abbreviation = strtoupper($abbreviation);

        return Arr::get($this->config->get('countries'), $abbreviation);
    }

    /**
     * @param string $name
     * @return string|null
     */
    public function abbreviation(string $name)
    {
        $countries = $this->config->get('countries');
        $found = $this->scanStringNames($name, $countries);

        if ($found) {
            return $found;
        } else {
            return $this->scanArrayNames($name, $countries);
        }
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->config->get('countries');
    }

    /**
     * @param string $name
     * @param array $countries
     * @return string|null
     */
    protected function scanStringNames(string $name, array $countries)
    {
        return array_search(ucwords($name), array_filter($countries, 'is_string'));
    }

    /**
     * @param string $name
     * @param array $countries
     * @return string|null
     */
    protected function scanArrayNames(string $name, array $countries)
    {
        foreach (array_filter($countries, 'is_array') as $abbreviation => $names) {
            if (in_array(strtolower($name), array_map('strtolower', $names))) {
                return $abbreviation;
            }
        }
    }
}
