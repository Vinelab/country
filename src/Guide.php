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

        if (array_search(ucwords($name), $countries)) {
            return array_search(ucwords($name), $countries);
        } else {
            foreach ($countries as $key => $value) {
                if (is_array($value) && in_array(strtolower($name), array_map('strtolower', $value))) {
                    return $key;
                }
            }
        }
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->config->get('countries');
    }
}
