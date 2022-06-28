<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dolzhnost".
 *
 * @property int $id
 * @property string $name
 */
class Dolzhnost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dolzhnost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
            [['name'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Атау',
        ];
    }
}
