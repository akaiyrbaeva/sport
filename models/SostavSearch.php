<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sostav;
use app\validators\DateRangeSeparatorValidator;

/**
 * SostavSearch represents the model behind the search form of `app\models\Sostav`.
 */
class SostavSearch extends Sostav
{
    /**
     * {@inheritdoc}
     */

    public $created_at_range;
    public $created_at_from;
    public $created_at_from_ts;
    public $created_at_to;
    public $created_at_to_ts;

    public function rules()
    {
        return [
            [['id', 'klass', 'ves', 'created_at', 'updated_at'], 'integer'],
            [['fio', 'inn', 'data_rozhdenia', 'telefon', 'adres', 'shkola', 'pol', 'data_zachisleniya', 'razryad', 'sport', 'medosmostr', 'primechanie'], 'safe'],

            [
                'created_at_range',
                DateRangeSeparatorValidator::className(),
                'startAttribute' => 'created_at_from',
                'endAttribute' => 'created_at_to',
                'startTimestampAttribute' => 'created_at_from_ts',
                'endTimestampAttribute' => 'created_at_to_ts',
                'interval' => DateRangeSeparatorValidator::INTERVAL_DAY,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Sostav::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'fio' => SORT_ASC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'klass' => $this->klass,
            'ves' => $this->ves,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'data_rozhdenia', $this->data_rozhdenia])
            ->andFilterWhere(['like', 'data_zachisleniya', $this->data_zachisleniya])
            ->andFilterWhere(['like', 'medosmostr', $this->medosmostr])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'adres', $this->adres])
            ->andFilterWhere(['like', 'shkola', $this->shkola])
            ->andFilterWhere(['like', 'pol', $this->pol])
            ->andFilterWhere(['like', 'razryad', $this->razryad])
            ->andFilterWhere(['like', 'sport', $this->sport])
            ->andFilterWhere(['like', 'primechanie', $this->primechanie]);

        return $dataProvider;
    }
}
