<?php

namespace app\models\search;

use app\models\User;
use app\validators\DateRangeSeparatorValidator;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserSearch extends Model
{
    public $id;
    public $fio;
    public $username;
    public $email;
    public $status;

    public $created_at_range;
    public $created_at_from;
    public $created_at_from_ts;
    public $created_at_to;
    public $created_at_to_ts;

    public $updated_at_range;
    public $updated_at_from;
    public $updated_at_to;
    public $updated_at_from_ts;
    public $updated_at_to_ts;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],

            [['username', 'email', 'fio'], 'safe'],

            [
                'created_at_range',
                DateRangeSeparatorValidator::className(),
                'startAttribute' => 'created_at_from',
                'endAttribute' => 'created_at_to',
                'startTimestampAttribute' => 'created_at_from_ts',
                'endTimestampAttribute' => 'created_at_to_ts',
                'interval' => DateRangeSeparatorValidator::INTERVAL_DAY,
            ],

            [
                'updated_at_range',
                DateRangeSeparatorValidator::className(),
                'startAttribute' => 'updated_at_from',
                'endAttribute' => 'updated_at_to',
                'startTimestampAttribute' => 'updated_at_from_ts',
                'endTimestampAttribute' => 'updated_at_to_ts',
                'interval' => DateRangeSeparatorValidator::INTERVAL_DAY,
            ],

        ];
    }

    public function search($params)
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'username' => SORT_ASC,
                ],
            ],
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);

        if (!$this->load($params) || !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['>=', 'created_at', $this->created_at_from_ts]);
        $query->andFilterWhere(['<', 'created_at', $this->created_at_to_ts]);

        $query->andFilterWhere(['>=', 'updated_at', $this->updated_at_from_ts]);
        $query->andFilterWhere(['<', 'updated_at', $this->updated_at_to_ts]);

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
        ]);
        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }

    public function formName()
    {
        return '';
    }
}
