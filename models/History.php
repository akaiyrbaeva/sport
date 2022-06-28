<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_at
 * @property string $action
 * @property string $comment
 */
class History extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%history}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['action', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Қолданушы',
            'created_at' => 'Күн және уақыт',
            'action' => 'Әрекет',
            'comment' => 'Қосымша ақпарат',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function actionLabels()
    {
        return [
            'login' => 'Жүйеге кіру',
            'logout' => 'Шығу',

            'user_create' => 'Жаңа қолданушы қосылды',
            'user_update' => 'Қолданушы деректері өзгертілді',
            'user_delete' => 'Қолданушы өшірілді',

            'draftee_create' => 'Добавлен новый призывник',
            'draftee_update' => 'Изменены данные призывника',
            'draftee_delete' => 'Удален призывник',
        ];
    }

}
