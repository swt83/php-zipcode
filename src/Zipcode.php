<?php

namespace Travis;

class Zipcode
{
	public $five = null;
	public $four = null;
	public $full = null;

	public static function make($str)
	{
		$class = __CLASS__;

		return new $class($str);
	}

	public function __construct($str)
	{
		$parts = explode('-', $str);

		if (sizeof($parts) > 1)
		{
			$this->five = $parts[0];
			$this->four = $parts[1];
		}
		else
		{
			$this->five = $str;
		}

		$this->five = (string) str_pad($this->five, 5, '0', STR_PAD_LEFT);
		$this->four = $this->four ? (string) str_pad($this->four, 4, '0', STR_PAD_LEFT) : null;

		$this->full = (string) $this->four ? $this->five.'-'.$this->four : $this->five;
	}
}