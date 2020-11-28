<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cpu;

/**
 * CpuSearch represents the model behind the search form about `app\models\Cpu`.
 */
class CpuSearch extends Cpu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_cpu', 'fabricante', 'cpuDetalles', 'serialNumber', 'idComputadora'], 'safe'],
            # [['idCpu', 'referencia', 'idComputadora'], 'integer'],
            #[['autorizado'], 'boolean'],
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
        $query = Cpu::find()->where('referencia isnull');

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],

            'sort' => [
                'defaultOrder' => [
                    'idCpu' => SORT_DESC,
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
            #'idCpu' => $this->idCpu,
            #'referencia' => $this->referencia,
            #'autorizado' => $this->autorizado,
            #'idComputadora' => $this->idComputadora,
        ]);

        #hace referencia al metodo por la cual se accede a este modelo
        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_cpu', $this->fecha_cpu])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'cpuDetalles', $this->cpuDetalles])
            ->andFilterWhere(['like', 'serialNumber', $this->serialNumber])
            #computadora (nombre de la tabla de la base de datos)
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora]);

        return $dataProvider;
    }
}
