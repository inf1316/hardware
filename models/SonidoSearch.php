<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sonido;

/**
 * SonidoSearch represents the model behind the search form about `app\models\Sonido`.
 */
class SonidoSearch extends Sonido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSonido', 'referencia'], 'integer'],
            [['fecha_sonido', 'autorizado', 'fabricante', 'descripcion', 'identificadorSonido', 'idComputadora'], 'safe'],
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
        $query = Sonido::find()->where('referencia isnull');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],

            'sort' => [
                'defaultOrder' => [
                    'idSonido' => SORT_DESC,
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
            #'idSonido' => $this->idSonido,
            #'referencia' => $this->referencia,
            #'idComputadora' => $this->idComputadora,
        ]);

        #Para poder entrar en la relación
        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_sonido', $this->fecha_sonido])
            #->andFilterWhere(['like', 'autorizado', $this->autorizado])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'identificadorSonido', $this->identificadorSonido])
            #campos de la relacion
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora]);

        return $dataProvider;
    }
}
