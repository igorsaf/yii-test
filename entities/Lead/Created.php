<?php


namespace app\entities\Lead;


use Assert\Assertion;

class Created
{
	private $at;
	private $by;

	public function __construct(\DateTimeImmutable $at, string $by)
	{
		Assertion::notEmpty($at);
		Assertion::notEmpty($by);

		$this->at = $at;
		$this->by = $by;
	}

	public function getCreatedAt(): \DateTimeImmutable { return $this->at; }
	public function getCreatedBy(): string { return $this->by; }
}
