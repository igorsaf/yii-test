<?php

namespace app\repositories;

use app\models\Lead;

interface LeadRepository {

	public function getOne(int $id): Lead;

	public function getList(array $filter, int $page): array;

	public function create(Lead $lead): void;

	public function update(Lead $lead): void;

	public function remove(Lead $lead): void;
}
