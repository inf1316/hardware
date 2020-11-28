<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Memoria;

class _MemoriaSearch extends Memoria
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['memoryRam', 'slots', 'numeroSerie'], 'safe'],
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
        $query = Memoria::find()->where(['referencia' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'memoryRam', $this->memoryRam])
            ->andFilterWhere(['like', 'slots', $this->slots])
            ->andFilterWhere(['like', 'numeroSerie', $this->numeroSerie]);

        return $dataProvider;
    }
}