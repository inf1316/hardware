<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "memoria".
 *
 * @property integer $idmemoria
 * @property string $fecha
 * @property string $referencia
 * @property string $autorizado
 * @property integer $idComputadora
 * @property string $memoryRam
 * @property string $slots
 * @property string $numeroSerie
 *
 * @property Computadora $idComputadora0
 */
class Memoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia'], 'string'],
            [['idComputadora', 'memoryRam', 'numeroSerie'], 'required'],
            [['idComputadora'], 'safe'],
            [['idComputadora'], 'integer'],
            [['fecha_memoria'], 'string', 'max' => 20],
            [['autorizado'], 'string', 'max' => 5],
            [['memoryRam'], 'string', 'max' => 100],
            [['slots'], 'string', 'max' => 10],
            [['numeroSerie'], 'string', 'max' => 150],
            [['numeroSerie'], 'unique'],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmemoria' => 'Idmemoria',
            'fecha_memoria' => 'Fecha',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
            'idComputadora' => 'Computadora',
            'memoryRam' => 'Memory Ram',
            'slots' => 'Slots',
            'numeroSerie' => 'Numero Serie',
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
