<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mouse".
 *
 * @property integer $idMouse
 * @property string $fecha
 * @property integer $referencia
 * @property string $autorizado
 * @property string $tipoMouse
 * @property string $identificadorMouse
 * @property string $fabricante
 * @property integer $idComputadora
 *
 * @property Computadora $idComputadora0
 */
class Mouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mouse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia', 'idComputadora'], 'integer'],
            [['tipoMouse', 'identificadorMouse', 'fabricante', 'idComputadora'], 'required'],
            [['fecha_mouse'], 'string', 'max' => 20],
            [['autorizado'], 'string', 'max' => 5],
            [['identificadorMouse'], 'unique'],
            [['tipoMouse', 'identificadorMouse', 'fabricante'], 'string', 'max' => 100],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMouse' => 'Id Mouse',
            'fecha_mouse' => 'Fecha',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
            'tipoMouse' => 'Tipo Mouse',
            'identificadorMouse' => 'Número Serie',
            'fabricante' => 'Fabricante',
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
