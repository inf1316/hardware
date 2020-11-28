<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "red".
 *
 * @property integer $idTarjeta
 * @property string $fecha
 * @property integer $referencia
 * @property string $autorizado
 * @property string $fabricante
 * @property string $mac
 * @property integer $idComputadora
 *
 * @property Computadora $idComputadora0
 */
class Red extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'red';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia', 'idComputadora'], 'integer'],
            [['mac', 'idComputadora'], 'required'],
            [['fecha_red'], 'string', 'max' => 20],
            [['autorizado'], 'string', 'max' => 5],
            [['fabricante'], 'string', 'max' => 100],
            [['mac'], 'string', 'max' => 200],
            [['mac'], 'unique'],
            [['mac'], 'validateMac', 'skipOnEmpty' => false, 'skipOnError' => false],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTarjeta' => 'Id Tarjeta',
            'fecha_red' => 'Fecha',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
            'fabricante' => 'Fabricante',
            'mac' => 'Mac',
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

    #Reglas de validación propia para validar campo mac con una expresión regular
    public function  validateMac($attribute)
    {
        if (!preg_match('/^[a-f0-9]{2}[:-][a-f0-9]{2}[:-][a-f0-9]{2}[:-][a-f0-9]{2}[:-][a-f0-9]{2}[:-][a-f0-9]{2}$/i', $this->$attribute)) {
            $this->addError($attribute, 'Entrada inválida para un campo mac');
        }
    }
}
