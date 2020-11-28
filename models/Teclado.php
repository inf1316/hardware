<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teclado".
 *
 * @property integer $idTeclado
 * @property string $fecha
 * @property integer $referencia
 * @property string $autorizado
 * @property string $descripcion
 * @property string $identificadorTeclado
 * @property integer $idComputadora
 *
 * @property Computadora $idComputadora0
 */
class Teclado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teclado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia', 'idComputadora'], 'integer'],
            [['idComputadora', 'identificadorTeclado', 'descripcion'], 'required'],
            [['fecha_teclado'], 'string', 'max' => 20],
            [['autorizado'], 'string', 'max' => 5],
            [['identificadorTeclado'], 'unique'],
            [['descripcion', 'identificadorTeclado'], 'string', 'max' => 150],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTeclado' => 'Id Teclado',
            'fecha_teclado' => 'Fecha',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
            'descripcion' => 'Descripción',
            'identificadorTeclado' => 'Numero Serie',
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
