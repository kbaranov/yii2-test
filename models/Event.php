<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%event}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $strategy
 */
class Event extends ActiveRecord
{
    const STRATEGY_TASK = 'task';
    const STRATEGY_SMS = 'sms';
    const STRATEGY_CALL = 'call';
    const STRATEGY_FAX = 'fax';
    const STRATEGY_CUSTOMER_TYPE = 'customer_type';
    const STRATEGY_CUSTOMER_QUALITY = 'customer_quality';

    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%event}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['name', 'title', 'strategy'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'title' => Yii::t('app', 'Title'),
            'strategy' => Yii::t('app', 'Strategy'),
        ];
    }
}
