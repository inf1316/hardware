<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disco".
 *
 * @property integer $iddisco
 * @property string $fecha
 * @property integer $idComputadora
 * @property string $numeroSerie
 * @property string $fabricante
 * @property integer $referencia
 * @property string $autorizado
 *
 * @property Computadora $idComputadora0
 */
class Disco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idComputadora', 'numeroSerie','fabricante'], 'required'],
            [['referencia'], 'integer'],
            [['idComputadora'], 'safe'],
            [['fecha_disco'], 'string', 'max' => 20],
            [['numeroSerie', 'fabricante'], 'string', 'max' => 150],
            [['numeroSerie'],'unique'],
            [['autorizado'], 'string', 'max' => 5],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddisco' => 'Iddisco',
            'fecha_disco' => 'Fecha',
            'idComputadora' => 'Computadora',
            'numeroSerie' => 'Numero Serie',
            'fabricante' => 'Fabricante',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComputadora0()
    {
        return $this->hasOne(Computadora::className(), ['idComputadora' => 'idComputadora']);
    }

    #Metodos auxiliar para mostrar datos en un DetailView de una relacion
    public function  getData($data)
    {
        return Computadora::find()->where(['idComputadora' => $data])->one();
    }

}
