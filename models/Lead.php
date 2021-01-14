<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "leads".
 *
 * @property int $id
 * @property string $name
 * @property int $source_id
 * @property int $status
 * @property int $created_at
 * @property int $created_by
 */
class Lead extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leads';
    }


	public function behaviors()
	{
		return ArrayHelper::merge(parent::behaviors(), [
			[
				'class' => TimestampBehavior::class,
				'createdAtAttribute' => 'created_at',
				'updatedAtAttribute' => null,
			],
			[
				'class' => BlameableBehavior::class,
				'createdByAttribute' => 'created_by',
				'updatedByAttribute' => null,
			]
		]);
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'source_id', 'status'], 'required'],
            [['source_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'source_id' => 'Source ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }
}
