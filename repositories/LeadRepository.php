<?php

namespace app\repositories;

use app\entities\Lead\Id;
use app\entities\Lead\Lead;

interface LeadRepository
{
	/**
	 * @param Id $id
	 * @return Lead
	 * @throws NotFoundException
	 */
	public function get(Id $id): Lead;

	public function add(Lead $lead): void;

	public function save(Lead $lead): void;

	public function remove(Lead $lead): void;
}
