<?php namespace Vinelab\Country;

Class Guide {

	function __construct($config)
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