<?php


namespace app\controllers;


use app\models\Lead;
use app\models\User;
use app\services\LeadService;
use yii\base\Controller;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;

class LeadController extends Controller
{

	private $leadService;

	public function __construct($id, $module, LeadService $leadService, $config = [])
	{
		$this->leadService = $leadService;

		parent::__construct($id, $module, $config);
	}

	public function behaviors()
	{
		return ArrayHelper::merge(parent::behaviors(), [
			'authenticator' => [
				'class' => HttpBasicAuth::class,
			],
			'access' => [
				'class' => AccessControl::class,
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@']
					]
				],
				'denyCallback' => function($rule, $action) {
					throw new ForbiddenHttpException('You are not allowed to access this page');
				}
			]
		]);
	}

	public function actionIndex()
	{
		$filter = [
			'created_by' => \Yii::$app->getRequest()->getBodyParam('created_by'),
			'status' => \Yii::$app->getRequest()->getBodyParam('status')
		];

		$page = \Yii::$app->getRequest()->getBodyParam('page');

		return $this->leadService->getList($filter, $page);
	}

	public function actionCreate()
	{
		return $this->leadService->create(\Yii::$app->getRequest()->getBodyParams());
	}
}
