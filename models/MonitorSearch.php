<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Monitor;

/**
 * MonitorSearch represents the model behind the search form about `app\models\Monitor`.
 */
class MonitorSearch extends Monitor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia'], 'integer'],
            [['fecha_monitor', 'autorizado', 'fabricante', 'identificadorMonitor', 'tipoMonitor', 'idMonitor','idComputadora'], 'safe'],
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
        $query = Monitor::find()->where('referencia isnull');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort' => [
                'defaultOrder' => [
                    'idMonitor' => SORT_DESC,
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
            #'idMonitor' => $this->idMonitor,
            #'referencia' => $this->referencia,
            #'idComputadora' => $this->idComputadora,
        ]);

        $query->joinWith('idComputadora0');

        $query->andFilterWhere(['like', 'fecha_monitor', $this->fecha_monitor])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'identificadorMonitor', $this->identificadorMonitor])
            ->andFilterWhere(['like', 'tipoMonitor', $this->tipoMonitor])
            ->andFilterWhere(['like', 'computadora.nombre', $this->idComputadora]);
        #->andFilterWhere(['like', 'autorizado', $this->autorizado])

        return $dataProvider;
    }
}
