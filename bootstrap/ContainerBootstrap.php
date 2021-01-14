<?php


namespace app\bootstrap;


use app\repositories\ARLeadRepository;
use app\repositories\LeadRepository;
use yii\base\Application;
use yii\base\BootstrapInterface;

class ContainerBootstrap implements BootstrapInterface
{

	/**
	 * @inheritDoc
	 */
	public function bootstrap($app)
	{
		$container = \Yii::$container;

		$container->setSingleton(LeadRepository::class, ARLeadRepository::class);
	}
}
