<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cd;

/**
 * CdSearch represents the model behind the search form about `app\models\Cd`.
 */
class CdSearch extends Cd
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCD', 'referencia'], 'integer'],
            [['fecha_cd',  'fabricante', 'numeroSerie', 'idComputadora'], 'safe'],
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
        $query = Cd::find()->where('referencia isnull');

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],

            'sort' => [
                'defaultOrder' => [
                    'idCD' => SORT_DESC,
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
            #'idCD' => $this->idCD,
            #'idComputadora' => $this->idComputadora,
            #'referencia' => $this->referencia,
            #'autorizado' => $this->autorizado
        ]);

        #hace referencia al metodo por la cual se accede a este modelo
        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_cd', $this->fecha_cd])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'numeroSerie', $this->numeroSerie])

            #computadora (nombre de la tabla de la base de datos)
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora]);
            #->andFilterWhere(['like', 'autorizado', $this->autorizado])
        return $dataProvider;
    }
}
