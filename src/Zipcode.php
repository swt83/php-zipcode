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
		// explode at dash
		$parts = explode('-', $str);

		// if dash found...
		if (sizeof($parts) > 1)
		{
			// save parts
			$this->five = $parts[0];
			$this->four = $parts[1];
		}
		else
		{
			// get string length
			$len = strlen($str);

			// if length is 5 or less...
			if ($len <= 5)
			{
				// just save 5
				$this->five = $str;
			}

			// else if length is more than 5...
			else
			{
				// save both
				$this->four = substr($str, -4);
				$this->five = substr($str, 0, -4);
			}
		}

		// strip non numbers
		$this->five = $this->five ? preg_replace('/\D/', '', $this->five) : null;
		$this->four = $this->five ? preg_replace('/\D/', '', $this->four) : null;

		// add padding zeroes
		$this->five = $this->five ? (string) str_pad($this->five, 5, '0', STR_PAD_LEFT) : null;
		$this->four = $this->four ? (string) str_pad($this->four, 4, '0', STR_PAD_LEFT) : null;

		// finalize
		$this->full = (string) $this->four ? $this->five.'-'.$this->four : $this->five;
	}
}