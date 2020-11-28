<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Computadora;
use app\models\Local;

/**
 * ComputadoraSearch represents the model behind the search form about `app\models\Computadora`.
 */
class ComputadoraSearch extends Computadora
{
    public function attributes()
    {
        return array_merge(parent::attributes(),['idlocal.ubicacion']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idComputadora', 'referecia' ],'integer'],
            [['fecha',  'idlocal.ubicacion', 'id_local','numeroInventario', 'numeroLicenciaSistOperativo', 'nombre', 'sistOperativo'], 'safe'],
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
        $query = Computadora::find()->where('referecia isnull');

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort' => [
                'defaultOrder' => [
                    'idComputadora' => SORT_DESC,
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
            'idComputadora' => $this->idComputadora,
            'referecia' => $this->referecia,
            #'id_local' => $this->id_local,
        ]);

        #hace referencia al metodo por la cual se accede a este modelo
        $query->joinWith('idLocal');

        $query->andFilterWhere(['like', 'fecha', $this->fecha])
            ->andFilterWhere(['like', 'local.ubicacion', $this->numeroInventario])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'local.departamento', $this->id_local])
            ->andFilterWhere(['like', 'sistOperativo', $this->sistOperativo]);

        #estas estan comentadas ya que no se ultilizan en el GridView
        #->andFilterWhere(['like', 'autorizado', $this->autorizado])
        #->andFilterWhere(['like', 'numeroLicenciaSistOperativo', $this->numeroLicenciaSistOperativo])

        return $dataProvider;
    }
}
