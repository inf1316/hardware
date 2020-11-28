<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Disco;

/**
 * DiscoSearch represents the model behind the search form about `app\models\Disco`.
 */

class _DiscoSearch extends Disco
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddisco', 'referencia'], 'integer'],
            [['fecha_disco', 'numeroSerie', 'fabricante', 'autorizado', 'idComputadora'], 'safe'],
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
    public function search($params,$id)
    {
        $query = Disco::find()->where(['referencia' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'numeroSerie', $this->numeroSerie])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante]);
        return $dataProvider;
    }
}