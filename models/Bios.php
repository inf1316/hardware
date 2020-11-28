<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bios".
 *
 * @property integer $idBios
 * @property string $fecha
 * @property integer $referencia
 * @property string $autorizado
 * @property integer $idComputadora
 * @property string $fabricante
 * @property string $numeroSerie
 *
 * @property Computadora $idComputadora0
 */
class Bios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia', 'idComputadora'], 'integer'],
            [['idComputadora', 'numeroSerie'], 'required'],
            [['numeroSerie'], 'unique'],
            [['fecha_bios'], 'string', 'max' => 15],
            [['autorizado'], 'boolean'],
            [['fabricante', 'numeroSerie'], 'string', 'max' => 150],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idBios' => 'Id Bios',
            'fecha_bios' => 'Fecha',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
            'idComputadora' => 'Computadora',
            'fabricante' => 'Fabricante',
            'numeroSerie' => 'Número Serie',
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
