<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "board".
 *
 * @property integer $idBoard
 * @property string $fecha
 * @property integer $referencia
 * @property string $autorizado
 * @property string $numeroSerie
 * @property string $fabricante
 * @property integer $idComputadora
 *
 * @property Computadora $idComputadora0
 */
class Board extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'board';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referencia', 'idComputadora'], 'integer'],
            [['numeroSerie', 'idComputadora'], 'required'],
            [['idComputadora'], 'safe'],
            [['fecha_board'], 'string', 'max' => 20],
            [['autorizado'], 'boolean'],
            [['numeroSerie'], 'unique'],
            [['numeroSerie'], 'string', 'max' => 300],
            [['fabricante'], 'string', 'max' => 100],
            [['idComputadora'], 'exist', 'skipOnError' => true, 'targetClass' => Computadora::className(), 'targetAttribute' => ['idComputadora' => 'idComputadora']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idBoard' => 'Id Board',
            'fecha_board' => 'Fecha',
            'referencia' => 'Referencia',
            'autorizado' => 'Autorizado',
            'numeroSerie' => 'Numero Serie',
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
