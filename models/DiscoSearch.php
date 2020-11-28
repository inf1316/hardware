<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Disco;

/**
 * DiscoSearch represents the model behind the search form about `app\models\Disco`.
 */
class DiscoSearch extends Disco
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
    public function search($params)
    {
        $query = Disco::find()->where('referencia isnull');

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort' => [
                'defaultOrder' => [
                    'iddisco' => SORT_DESC,
                ]
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
            //'iddisco' => $this->iddisco,
            //'idComputadora' => $this->idComputadora,
            //'referencia' => $this->referencia,
        ]);

        #para acceder a la relación
        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_disco', $this->fecha_disco])
            ->andFilterWhere(['like', 'numeroSerie', $this->numeroSerie])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora]);
        #campo que no se muestra
        #->andFilterWhere(['like', 'autorizado', $this->autorizado]);

        return $dataProvider;
    }
}
