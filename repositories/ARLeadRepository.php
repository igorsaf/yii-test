<?php


namespace app\repositories;


use app\models\Lead;
use yii\data\ActiveDataProvider;

class ARLeadRepository implements LeadRepository
{

	public function getOne($id): Lead
	{
		if (!$lead = Lead::findOne($id)) {
			throw new NotFoundException('Lead not found');
		}

		return $lead;
	}

	public function getList(array $filter, ?int $page = 0): array
	{
		$query = Lead::find();

		empty($filter['created_by']) || $query->andWhere(['created_by' => (int) $filter['created_by']]);
		empty($filter['status']) || $query->andWhere(['status' => (int) $filter['status']]);

		$data = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'page' => $page,
				'pageSize' => 4
			]
		]);

		return [
			'items' => $data->getModels(),
			'pagination' => [
				'page' => $data->getPagination()->getPage(),
				'pageCount' => $data->getPagination()->getPageCount(),
				'pageSize' => $data->getPagination()->getPageSize(),
				'totalCount' => $data->getTotalCount()
			]
		];
	}

	public function create(Lead $lead): void
	{
		if (!$lead->insert()) {
			throw new \RuntimeException('Creating error');
		}
	}

	public function update(Lead $lead): void
	{
		if ($lead->update() === false) {
			throw new \RuntimeException('Updating error');
		}
	}

	public function remove(Lead $lead): void
	{
		if (!$lead->delete()) {
			throw new \RuntimeException('Removing error');
		}
	}
}
