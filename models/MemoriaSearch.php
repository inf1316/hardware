<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Memoria;

/**
 * MemoriaSearch represents the model behind the search form about `app\models\Memoria`.
 */
class MemoriaSearch extends Memoria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmemoria'], 'integer'],
            [['fecha_memoria', 'referencia', 'autorizado', 'memoryRam', 'slots', 'numeroSerie', 'idComputadora'], 'safe'],
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
        $query = Memoria::find()->where('referencia is null');

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],

            'sort' => [
                'defaultOrder' => [
                    'idmemoria' => SORT_DESC,
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
            #'idmemoria' => $this->idmemoria,
            #'idComputadora' => $this->idComputadora,
        ]);

        #hace referencia al metodo por la cual se accede a este modelo
        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_memoria', $this->fecha_memoria])
            #->andFilterWhere(['like', 'referencia', $this->referencia])
            #->andFilterWhere(['like', 'autorizado', $this->autorizado])
            ->andFilterWhere(['like', 'memoryRam', $this->memoryRam])
            ->andFilterWhere(['like', 'slots', $this->slots])
            #computadora (nombre de la tabla de la base de datos)
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora])
            ->andFilterWhere(['like', 'numeroSerie', $this->numeroSerie]);

        return $dataProvider;
    }
}
