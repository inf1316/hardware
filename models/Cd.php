<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cd".
 *
 * @property integer $idCD
 * @property string $fecha
 * @property integer $referencia
 * @property string $autorizado
 * @property string $fabricante
 * @property string $numeroSerie
 * @property integer $idComputadora
 *
 * @property Computadora $idComputadora0
 */
class Cd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia', 'idComputadora'], 'integer'],
            [['idComputadora'], 'required'],
            [['idComputadora'], 'safe'],
            [['fecha_cd'], 'string', 'max' => 15],
            [['autorizado'], 'boolean'],
            [['numeroSerie'],'required'],
            [['numeroSerie'],'unique'],
            [['fabricante', 'numeroSerie'], 'string', 'max' => 100],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCD' => 'Id Cd',
            'fecha_cd' => 'Fecha',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
            'fabricante' => 'Fabricante',
            'numeroSerie' => 'Número Serie',
            'idComputadora' => 'Computadora',
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
