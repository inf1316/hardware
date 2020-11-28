<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Monitor;

# Clase _MonitorSearch para mostrar los datos en el ExpandRowColumn
class _MonitorSearch extends Monitor {

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fabricante', 'identificadorMonitor', 'tipoMonitor'], 'safe'],
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
        $query = Monitor::find()->where(['referencia' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'identificadorMonitor', $this->identificadorMonitor])
            ->andFilterWhere(['like', 'tipoMonitor', $this->tipoMonitor]);
        return $dataProvider;
    }
}