<?php


namespace app\entities\Lead;


use Assert\Assertion;

class Source
{
	const SITE = 'site';
	const ADS = 'ads';
	const ORGANIC = 'organic';

	private $source;

	public function __construct(string $source)
	{
		Assertion::inArray($source, [
			self::SITE,
			self::ADS,
			self::ORGANIC
		]);

		$this->source = $source;
	}

	public function getSource(): string { return $this->source; }
}
