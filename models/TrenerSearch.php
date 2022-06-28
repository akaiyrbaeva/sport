<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trener;
use app\validators\DateRangeSeparatorValidator;

/**
 * TrenerSearch represents the model behind the search form of `app\models\Trener`.
 */
class TrenerSearch extends Trener
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
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['fio', 'inn', 'data_rozhdenia', 'stazh', 'telefon', 'adres', 'tip_trenera', 'dolzhnost', 'sport', 'razryad', 'primechanie'], 'safe'],

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
        $query = Trener::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'data_rozhdenia', $this->data_rozhdenia])
            ->andFilterWhere(['like', 'stazh', $this->stazh])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'adres', $this->adres])
            ->andFilterWhere(['like', 'tip_trenera', $this->tip_trenera])
            ->andFilterWhere(['like', 'dolzhnost', $this->dolzhnost])
            ->andFilterWhere(['like', 'sport', $this->sport])
            ->andFilterWhere(['like', 'razryad', $this->razryad])
            ->andFilterWhere(['like', 'primechanie', $this->primechanie]);

        return $dataProvider;
    }
}
