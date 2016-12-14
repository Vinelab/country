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

        return array_search(ucwords($name), $countries);
    }

    public function all()
    {
        return $this->config->get('countries');
    }

}

