<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bios;

/**
 * BiosSearch represents the model behind the search form about `app\models\Bios`.
 */
class BiosSearch extends Bios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_bios', 'fabricante', 'numeroSerie', 'idComputadora'], 'safe'],
            [['idBios', 'referencia'], 'integer'],
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
        $query = Bios::find()->where('referencia isnull');

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort' => [
                'defaultOrder' => [
                    'idBios' => SORT_DESC,
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
            #'idBios' => $this->idBios,
            #'referencia' => $this->referencia,
            #'idComputadora' => $this->idComputadora,
            #'autorizado' => $this->autorizado
        ]);

        #hace referencia al metodo por la cual se accede a este modelo
        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_bios', $this->fecha_bios])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'numeroSerie', $this->numeroSerie])

            #computadora (nombre de la tabla de la base de datos)
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora]);
        return $dataProvider;
    }
}
