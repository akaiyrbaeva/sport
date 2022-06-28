<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sovernovaniya;
use app\validators\DateRangeSeparatorValidator;

/**
 * SovernovaniyaSearch represents the model behind the search form of `app\models\Sovernovaniya`.
 */
class SovernovaniyaSearch extends Sovernovaniya
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
            [['id', 'kolichestvo_uchastnikov', 'created_at', 'updated_at'], 'integer'],
            [['data_nachala', 'data_okonchaniya', 'naimenovanie', 'mesto_provedeniya', 'vid_sporta', 'rang_sorevnovaniya', 'primechanie'], 'safe'],

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
        $query = Sovernovaniya::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'data_nachala' => SORT_ASC,
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
            'kolichestvo_uchastnikov' => $this->kolichestvo_uchastnikov,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'data_nachala', $this->data_nachala])
            ->andFilterWhere(['like', 'data_okonchaniya', $this->data_okonchaniya])
            ->andFilterWhere(['like', 'naimenovanie', $this->naimenovanie])
            ->andFilterWhere(['like', 'mesto_provedeniya', $this->mesto_provedeniya])
            ->andFilterWhere(['like', 'vid_sporta', $this->vid_sporta])
            ->andFilterWhere(['like', 'rang_sorevnovaniya', $this->rang_sorevnovaniya])
            ->andFilterWhere(['like', 'primechanie', $this->primechanie]);

        return $dataProvider;
    }
}
