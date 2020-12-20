<?php


namespace app\entities\Lead;


use Assert\Assertion;

class Status
{
	const ACTIVE = 'active';
	const ARCHIVED = 'archived';

	private $status;

	public function __construct(string $status)
	{
		Assertion::inArray($status, [
			self::ACTIVE,
			self::ARCHIVED,
		]);

		$this->status = $status;
	}

	public function getStatus(): string { return $this->status; }
}
