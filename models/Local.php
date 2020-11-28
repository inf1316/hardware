<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "local".
 *
 * @property integer $id_local
 * @property string $ubicacion
 * @property string $departamento
 *
 * @property Computadora[] $computadoras
 */
class Local extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ubicacion', 'departamento'], 'string', 'min' => 3, 'max' => 50],
            [['ubicacion', 'departamento'], 'required'],
            [['departamento'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_local' => 'Id Local',
            'ubicacion' => 'Ubicación',
            'departamento' => 'Departamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComputadoras()
    {
        return $this->hasMany(Computadora::className(), ['id_local' => 'id_local']);
    }
}