<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mouse;


class _MouseSearch extends  Mouse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipoMouse', 'fabricante', 'identificadorMouse'], 'safe'],
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
        $query = Mouse::find()->where(['referencia' => $id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'tipoMouse', $this->tipoMouse])
            ->andFilterWhere(['like', 'identificadorMouse', $this->identificadorMouse])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante]);

        return $dataProvider;
    }
}