<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Board;



class _BoardSearch extends Board
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numeroSerie', 'fabricante'], 'safe'],
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
        $query = Board::find()->where(['referencia' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'numeroSerie', $this->numeroSerie])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante]);

        return $dataProvider;
    }
}