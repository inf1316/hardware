<?php
/**
 * Created by PhpStorm.
 * User: Gema
 * Date: 25/5/2017
 * Time: 6:17 PM
 */

namespace app\models;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bios;

class _BiosSearch extends Bios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fabricante', 'numeroSerie'], 'safe'],
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
        $query = Bios::find()->where(['referencia' => $id]);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $query->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'numeroSerie', $this->numeroSerie]);
        return $dataProvider;
    }
}