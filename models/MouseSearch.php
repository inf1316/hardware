<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mouse;

/**
 * MouseSearch represents the model behind the search form about `app\models\Mouse`.
 */
class MouseSearch extends Mouse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_mouse', 'autorizado', 'tipoMouse', 'identificadorMouse', 'fabricante', 'idComputadora'], 'safe'],
            #[['idMouse', 'referencia'], 'integer'],
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
        $query = Mouse::find()->where('referencia isnull');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 7,
            ],

            'sort' => [
                'defaultOrder' => [
                    'idMouse' => SORT_DESC,
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
            #estan comentados ya que no se utilizan en el GridView
            #'idMouse' => $this->idMouse,
            #'referencia' => $this->referencia,
            #'idComputadora' => $this->idComputadora,
        ]);

        #hace referencia al metodo por la cual se accede a este modelo
        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_mouse', $this->fecha_mouse])
            ->andFilterWhere(['like', 'tipoMouse', $this->tipoMouse])
            ->andFilterWhere(['like', 'identificadorMouse', $this->identificadorMouse])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante])

            #computadora (nombre de la tabla de la base de datos)
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora]);
            #->andFilterWhere(['like', 'autorizado', $this->autorizado])

        return $dataProvider;
    }
}
