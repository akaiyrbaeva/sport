<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "trener".
 *
 * @property int $id
 * @property string $fio
 * @property string $inn
 * @property string $data_rozhdenia
 * @property string $stazh
 * @property string $telefon
 * @property string $adres
 * @property string $tip_trenera
 * @property string $dolzhnost
 * @property string $sport
 * @property string $razryad
 * @property string $primechanie
 * @property int $created_at
 * @property int $updated_at
 */
class Trener extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trener';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'inn'], 'integer'],
            [['fio', 'adres', 'tip_trenera', 'dolzhnost', 'sport', 'razryad'], 'string', 'max' => 50],
            [['data_rozhdenia', 'stazh'], 'string', 'max' => 10],
            [['telefon'], 'string', 'max' => 15],
            [['primechanie'], 'string', 'max' => 255],
            [['fio', 'inn', 'data_rozhdenia', 'telefon', 'tip_trenera', 'sport', 'razryad'], 'required'],
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
            'stazh' => 'Педагог стажы',
            'telefon' => 'Телефон',
            'adres' => 'Тұрғылықты мекен-жайы',
            'tip_trenera' => 'Тренер типі',
            'dolzhnost' => 'Қызметі',
            'sport' => 'Спорт түрі',
            'razryad' => 'Ағымдағы разряд',
            'primechanie' => 'Қосымша ақпарат',
            'created_at' => 'Қосу күні',
            'updated_at' => 'Соңғы өзгеріс',
        ];
    }
}
