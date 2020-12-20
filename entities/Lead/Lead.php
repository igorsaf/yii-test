<?php

namespace app\entities\Lead;

use app\entities\AggregateRoot;
use app\entities\EventTrait;

class Lead implements AggregateRoot
{

	use EventTrait;

	/**
	 * @var Id
	 */
	private $id;

	/**
	 * @var Name
	 */
	private $name;

	/**
	 * @var Source
	 */
	private $source;

	/**
	 * @var Status
	 */
	private $status;

	/**
	 * @var Created
	 */
	private $created;

	public function __construct(
		Id $id,
		Name $name,
		Source $source,
		Status $status,
		Created $created
	) {
		$this->id = $id;
		$this->name = $name;
		$this->source = $source;
		$this->status = $status;
		$this->created = $created;

		$this->recordEvent(new Events\LeadCreated($this->id));
	}

	public function getId(): Id { return $this->id; }
	public function getName(): Name { return $this->name; }
	public function getSource(): Source { return $this->source; }
	public function getStatus(): Status { return $this->status; }
	public function getCreated(): Created { return $this->created; }
}
