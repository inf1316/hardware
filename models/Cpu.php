<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cpu".
 *
 * @property integer $idCpu
 * @property string $fecha
 * @property integer $referencia
 * @property boolean $autorizado
 * @property string $fabricante
 * @property integer $idComputadora
 * @property string $cpuDetalles
 * @property string $serialNumber
 *
 * @property Computadora $idComputadora0
 */
class Cpu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cpu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia', 'idComputadora'], 'integer'],
            [['autorizado'], 'boolean'],
            [['idComputadora', 'serialNumber'], 'required'],
            [['fecha_cpu'], 'string', 'max' => 20],
            [['fabricante'], 'string', 'max' => 50],
            [['cpuDetalles', 'serialNumber'], 'string', 'max' => 100],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCpu' => 'Id Cpu',
            'fecha_cpu' => 'Fecha',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
            'fabricante' => 'Fabricante',
            'idComputadora' => 'Computadora',
            'cpuDetalles' => 'Cpu Detalles',
            'serialNumber' => 'Numero Serie',
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
