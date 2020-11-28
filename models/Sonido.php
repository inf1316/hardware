<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sonido".
 *
 * @property integer $idSonido
 * @property string $fecha
 * @property integer $referencia
 * @property string $autorizado
 * @property string $fabricante
 * @property string $descripcion
 * @property string $identificadorSonido
 * @property integer $idComputadora
 *
 * @property Computadora $idComputadora0
 */
class Sonido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sonido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia', 'idComputadora'], 'integer'],
            [['fabricante', 'identificadorSonido'], 'required'],
            [['idComputadora'], 'safe'],
            [['fecha_sonido'], 'string', 'max' => 20],
            [['autorizado'], 'string', 'max' => 5],
            [['fabricante', 'descripcion', 'identificadorSonido'], 'string', 'max' => 100],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSonido' => 'Id Sonido',
            'fecha_sonido' => 'Fecha',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
            'fabricante' => 'Fabricante',
            'descripcion' => 'Descripcion',
            'identificadorSonido' => 'Número Serie',
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
