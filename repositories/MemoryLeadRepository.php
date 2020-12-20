<?php


namespace app\repositories;


use app\entities\Lead\Id;
use app\entities\Lead\Lead;

class MemoryLeadRepository implements LeadRepository
{

	private $items = [];

	/**
	 * @inheritDoc
	 */
	public function get(Id $id): Lead
	{
		if (array_key_exists($id, $this->items)) {
			throw new NotFoundException('Lead not found');
		}

		return clone $this->items[(string) $id];
	}

	public function add(Lead $lead): void
	{
		$this->items[(string) $lead->getId()] = $lead;
	}

	public function save(Lead $lead): void
	{
		$this->items[(string) $lead->getId()] = $lead;
	}

	public function remove(Lead $lead): void
	{
		if (!array_key_exists($lead->getId(), $this->items)) return;

		unset($this->items[(string) $lead->getId()]);
	}
}
