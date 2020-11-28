<?php
namespace app\models;

use yii\data\ActiveDataProvider;
use yii\base\Model;
use app\models\Cd;


# Clase CdSearch para mostrar los datos en el ExpandRowColumn

class _CdSearch extends Cd
{
    /**
     * CdSearch represents the model behind the search form about `app\models\Cd`.
     */
    public function rules()
    {
        return [
            [['fabricante', 'numeroSerie'], 'string'],
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
        $query = Cd::find()->where(['referencia' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'numeroSerie', $this->numeroSerie]);
        return $dataProvider;
    }
}