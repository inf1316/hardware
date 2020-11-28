<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Computadora;
use app\models\Local;


# Clase _ComputadoraSearch para mostrar los datos en el ExpandRowColumn

class _ComputadoraSearch extends Computadora
{

    public function rules()
    {
        return [
            [['fecha', 'numeroLicenciaSistOperativo', 'sistOperativo'], 'string'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params, $id)
    {
        $query = Computadora::find()->where(['referecia' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'fecha', $this->fecha])
            ->andFilterWhere(['like', 'numeroLicenciaSistOperativo', $this->numeroLicenciaSistOperativo])
            ->andFilterWhere(['like', 'sistOperativo', $this->sistOperativo]);
        return $dataProvider;
    }
}





