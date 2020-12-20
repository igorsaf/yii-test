<?php


namespace app\services\dto;


class LeadCreateDto
{
	/** @var string */
	public $name;

	/** @var string */
	public $source;

	/** @var string */
	public $status;

	/** @var CreatedDto */
	public $created;
}
