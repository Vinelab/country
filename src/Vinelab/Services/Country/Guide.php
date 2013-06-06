<?php namespace Vinelab\Services\Country;

Class Guide {

	function __construct(\Illuminate\Config\Repository $config)
	{
		$this->config = $config;
	}

	public function name($abbreviation)
	{
		$abbreviation = strtoupper($abbreviation);
		return $this->config->get("country::countries.{$abbreviation}");
	}

	public function abbreviation($name)
	{
		$countries = $this->config->get('country::countries');
		return array_search(ucwords($name), $countries);
	}
}