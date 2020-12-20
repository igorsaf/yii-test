<?php

namespace app\entities\Lead;

use Assert\Assertion;

class Name
{
	private $name;

	public function __construct(string $name)
	{
		Assertion::notEmpty($name);

		$this->name = $name;
	}

	public function getName():string { return $this->name; }
}
