<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SiteConfig;

/**
 * SiteConfigSearch represents the model behind the search form about `backend\models\SiteConfig`.
 */
class SiteConfigSearch extends SiteConfig
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'logo', 'desc', 'keywords', 'theme'], 'safe'],
            [['pageSize'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = SiteConfig::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pageSize' => $this->pageSize,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'theme', $this->theme]);

        return $dataProvider;
    }
}
