<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Red;

class _RedSearch extends  Red
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTarjeta', 'referencia'], 'integer'],
            [['fecha_red', 'autorizado', 'fabricante', 'mac', 'idComputadora'], 'safe'],
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
    public function search($params,$id)
    {
        $query = Red::find()->where(['referencia' => $id]);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'mac', $this->mac]);

        return $dataProvider;
    }
}