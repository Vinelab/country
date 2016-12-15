<?php

namespace Vinelab\Country;

class Guide
{
    public function __construct(\Illuminate\Config\Repository $config)
    {
        $this->config = $config;
    }

    public function name($abbreviation)
    {
        $abbreviation = strtoupper($abbreviation);

        return $this->config->get("countries.{$abbreviation}");
    }

    public function abbreviation($name)
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

    public function all()
    {
        return $this->config->get('countries');
    }
}
