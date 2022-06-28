<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiptrenera".
 *
 * @property int $id
 * @property string $name
 */
class Tiptrenera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiptrenera';
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
