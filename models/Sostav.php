<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "sostav".
 *
 * @property int $id
 * @property string $fio
 * @property string $inn
 * @property string $data_rozhdenia
 * @property string $telefon
 * @property string $adres
 * @property string $shkola
 * @property int $klass
 * @property string $pol
 * @property int $ves
 * @property string $data_zachisleniya
 * @property string $razryad
 * @property string $sport
 * @property string $medosmostr
 * @property string $primechanie
 * @property int $created_at
 * @property int $updated_at
 */
class Sostav extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sostav';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_rozhdenia', 'data_zachisleniya', 'medosmostr'], 'safe'],
            [['klass', 'ves', 'created_at', 'updated_at', 'inn'], 'integer'],
            [['fio', 'adres', 'shkola', 'pol', 'razryad', 'sport'], 'string', 'max' => 50],
            [['telefon'], 'string', 'max' => 15],
            [['primechanie'], 'string', 'max' => 255],
            [['fio', 'adres', 'pol', 'inn', 'telefon', 'data_rozhdenia', 'data_zachisleniya', 'medosmostr', 'sport'], 'required'],
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
            'fio' => 'Тегі А.Ж.',
            'inn' => 'ЖСН',
            'data_rozhdenia' => 'Туған күні',
            'telefon' => 'Телефон',
            'adres' => 'Тұрғылықты мекен-жайы',
            'shkola' => 'Білім алу мекемесі',
            'klass' => 'Сынып (курс)',
            'pol' => 'Жынысы',
            'ves' => 'Салмағы',
            'data_zachisleniya' => 'Тіркелу күні',
            'razryad' => 'Ағымдағы разряд',
            'sport' => 'Спорт түрі',
            'medosmostr' => 'Медициналық тексеруден өткен күн',
            'primechanie' => 'Қосымша ақпарат',
            'created_at' => 'Қосу күні',
            'updated_at' => 'Соңғы өзгеріс',
        ];
    }
}
