<?php

namespace app\models\search;

use app\models\History;
use app\validators\DateRangeSeparatorValidator;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class HistorySearch extends Model
{
    public $created_at_range;
    public $created_at_from;
    public $created_at_from_ts;
    public $created_at_to;
    public $created_at_to_ts;

    public $user_id;
    public $user_ids;

    public $action;
    public $comment;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['user_id', 'integer'],

            [
                'created_at_range',
                DateRangeSeparatorValidator::className(),
                'startAttribute' => 'created_at_from',
                'endAttribute' => 'created_at_to',
                'startTimestampAttribute' => 'created_at_from_ts',
                'endTimestampAttribute' => 'created_at_to_ts',
                'interval' => DateRangeSeparatorValidator::INTERVAL_DAY,
            ],

            ['action', 'string'],

            ['comment', 'string'],
        ];
    }

    public function search($params)
    {
        $query = History::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ],
            ],
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['>=', 'created_at', $this->created_at_from_ts]);
        $query->andFilterWhere(['<', 'created_at', $this->created_at_to_ts]);

        $query->andFilterWhere(['user_id' => $this->user_id]);

        $query->andFilterWhere(['like', 'action', $this->action]);
        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }

    public function formName()
    {
        return '';
    }
}
