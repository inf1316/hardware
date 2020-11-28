<?php

namespace app\models;

use Yii;
use app\models\Computadora;

/**
 * This is the model class for table "monitor".
 *
 * @property integer $idMonitor
 * @property string $fecha
 * @property integer $referencia
 * @property string $autorizado
 * @property string $fabricante
 * @property string $identificadorMonitor
 * @property string $tipoMonitor
 * @property integer $idComputadora
 *
 * @property Computadora $idComputadora0
 */
class Monitor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monitor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia' ], 'integer'],
            [['idComputadora'],'safe'],
            [['identificadorMonitor', 'tipoMonitor', 'idComputadora'], 'required'],
            [['identificadorMonitor'], 'unique'],
            [['fecha_monitor'], 'string', 'max' => 20],
            [['autorizado'], 'string', 'max' => 10],
            [['fabricante', 'tipoMonitor'], 'string', 'max' => 100],
            [['identificadorMonitor'], 'string', 'max' => 18],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMonitor' => 'Id Monitor',
            'fecha_monitor' => 'Fecha',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
            'fabricante' => 'Fabricante',
            'identificadorMonitor' => 'Número Serie',
            'tipoMonitor' => 'Modelo Monitor',
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
