<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cpu;



class _CpuSearch extends Cpu
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fabricante', 'cpuDetalles', 'serialNumber'], 'safe'],
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
    public function search($params, $id)
    {
        $query = Cpu::find()->where(['referencia' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'cpuDetalles', $this->cpuDetalles])
            ->andFilterWhere(['like', 'serialNumber', $this->serialNumber]);
        return $dataProvider;
    }
}