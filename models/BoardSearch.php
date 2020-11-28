<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Board;

/**
 * BoardSearch represents the model behind the search form about `app\models\Board`.
 */
class BoardSearch extends Board
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idBoard', 'referencia'], 'integer'],
            [['fecha_board', 'numeroSerie', 'fabricante', 'idComputadora'], 'safe'],
            [['autorizado'], 'boolean'],
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
        $query = Board::find()->where('referencia isnull');

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],

            'sort' => [
                'defaultOrder' => [
                    'idBoard' => SORT_DESC,
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
            #'idBoard' => $this->idBoard,
            #'referencia' => $this->referencia,
            #'idComputadora' => $this->idComputadora,
            #'autorizado' => $this->autorizado
        ]);

        #hace referencia al metodo por la cual se accede a este modelo
        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_board', $this->fecha_board])
            ->andFilterWhere(['like', 'numeroSerie', $this->numeroSerie])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante])
            #computadora (nombre de la tabla de la base de datos)
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora]);

        return $dataProvider;
    }
}
