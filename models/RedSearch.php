<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Red;

/**
 * RedSearch represents the model behind the search form about `app\models\Red`.
 */
class RedSearch extends Red
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTarjeta', 'referencia'], 'integer'],
            [['fecha_red', 'autorizado', 'fabricante', 'mac', 'idComputadora'], 'safe'],
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
        $query = Red::find()->where('referencia isnull');

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],

            'sort' => [
                'defaultOrder' => [
                    'idTarjeta' => SORT_DESC,
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
            #'idTarjeta' => $this->idTarjeta,
            #'referencia' => $this->referencia,
            #'idComputadora' => $this->idComputadora,
        ]);

        #Para acceder a la relacion
        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_red', $this->fecha_red])
            #->andFilterWhere(['like', 'autorizado', $this->autorizado])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante])
            #Campos de la tabla de la relacion
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora])
            ->andFilterWhere(['like', 'mac', $this->mac]);

        return $dataProvider;
    }
}
