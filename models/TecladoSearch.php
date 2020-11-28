<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Teclado;

/**
 * TecladoSearch represents the model behind the search form about `app\models\Teclado`.
 */
class TecladoSearch extends Teclado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_teclado', 'autorizado', 'descripcion', 'identificadorTeclado', 'idComputadora'], 'safe'],
            #[['idTeclado', 'referencia', 'idComputadora'], 'integer'],
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
        $query = Teclado::find()->where('referencia isnull');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],

            'sort' => [
                'defaultOrder' => [
                    'idTeclado' => SORT_DESC,
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
            #'idTeclado' => $this->idTeclado,
            #'referencia' => $this->referencia,
            #'idComputadora' => $this->idComputadora,
        ]);

        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_teclado', $this->fecha_teclado])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'identificadorTeclado', $this->identificadorTeclado])
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora]);
        #campo que no se muestra
        #->andFilterWhere(['like', 'autorizado', $this->autorizado])
        return $dataProvider;
    }
}
