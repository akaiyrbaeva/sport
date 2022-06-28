<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "sovernovaniya".
 *
 * @property int $id
 * @property string $data_nachala
 * @property string $data_okonchaniya
 * @property string $naimenovanie
 * @property string $mesto_provedeniya
 * @property int $kolichestvo_uchastnikov
 * @property string $vid_sporta
 * @property string $rang_sorevnovaniya
 * @property string $primechanie
 * @property int $created_at
 * @property int $updated_at
 */
class Sovernovaniya extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sovernovaniya';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kolichestvo_uchastnikov', 'created_at', 'updated_at'], 'integer'],
            [['data_nachala', 'data_okonchaniya'], 'string', 'max' => 10],
            [['naimenovanie', 'vid_sporta'], 'string', 'max' => 50],
            [['mesto_provedeniya', 'rang_sorevnovaniya'], 'string', 'max' => 100],
            [['primechanie'], 'string', 'max' => 255],
            [['data_nachala', 'data_okonchaniya', 'naimenovanie', 'mesto_provedeniya', 'rang_sorevnovaniya', 'vid_sporta'], 'required'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_nachala' => 'Басталу күні',
            'data_okonchaniya' => 'Аяқталу күні',
            'naimenovanie' => 'Жарыс атауы',
            'mesto_provedeniya' => 'Өткізілетін жері',
            'kolichestvo_uchastnikov' => 'Қатысушылар саны',
            'vid_sporta' => 'Спорт түрі',
            'rang_sorevnovaniya' => 'Жарыс дәрежесі',
            'primechanie' => 'Қосымша ақпарат',
            'created_at' => 'Қосу күні',
            'updated_at' => 'Соңғы өзгеріс',
        ];
    }
}
