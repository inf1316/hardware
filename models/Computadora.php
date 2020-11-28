<?php

namespace app\models;

use Yii;
use app\models\Local;


/**
 * This is the model class for table "computadora".
 *
 * @property integer $idComputadora
 * @property string $fecha
 * @property string $autorizado
 * @property integer $referecia
 * @property integer $id_local
 * @property string $numeroInventario
 * @property string $numeroLicenciaSistOperativo
 * @property string $nombre
 * @property string $sistOperativo
 *
 * @property Bios[] $bios
 * @property Board[] $boards
 * @property Cd[] $cds
 * @property Local $idLocal
 * @property Cpu[] $cpus
 * @property Disco[] $discos
 * @property Memoria[] $memorias
 * @property Monitor[] $monitors
 * @property Mouse[] $mice
 * @property Red[] $reds
 * @property Sonido[] $sonidos
 * @property Teclado[] $teclados
 */
class Computadora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'computadora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'id_local', 'numeroLicenciaSistOperativo', 'nombre', 'sistOperativo'], 'required'],
            [['referecia'], 'integer'],
            [['numeroLicenciaSistOperativo','numeroInventario'],'unique'],
            [['id_local'], 'safe'],
            [['fecha'], 'string', 'max' => 20],
            [['autorizado'], 'boolean'],
            [['numeroInventario', 'nombre', 'sistOperativo'], 'string', 'max' => 100],
            [['numeroLicenciaSistOperativo'], 'string', 'max' => 200],
            [['id_local'], 'exist', 'skipOnError' => true, 'targetClass' => Local::className(), 'targetAttribute' => ['id_local' => 'id_local']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComputadora' => 'Id Computadora',
            'fecha' => 'Fecha',
            'autorizado' => 'Autorizado',
            'referecia' => 'Referecia',
            'id_local' => 'Departamento',
            'numeroInventario' => 'Número Inventario',
            'numeroLicenciaSistOperativo' => 'Licencia Sistema Operativo',
            'nombre' => 'Nombre',
            'sistOperativo' => 'Sistema Operativo',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBios()
    {
        return $this->hasMany(Bios::className(), ['idComputadora' => 'idComputadora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoards()
    {
        return $this->hasMany(Board::className(), ['idComputadora' => 'idComputadora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCds()
    {
        return $this->hasMany(Cd::className(), ['idComputadora' => 'idComputadora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocal()
    {
        return $this->hasOne(Local::className(), ['id_local' => 'id_local']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpus()
    {
        return $this->hasMany(Cpu::className(), ['idComputadora' => 'idComputadora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscos()
    {
        return $this->hasMany(Disco::className(), ['idComputadora' => 'idComputadora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemorias()
    {
        return $this->hasMany(Memoria::className(), ['idComputadora' => 'idComputadora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonitors()
    {
        return $this->hasMany(Monitor::className(), ['idComputadora' => 'idComputadora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMice()
    {
        return $this->hasMany(Mouse::className(), ['idComputadora' => 'idComputadora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReds()
    {
        return $this->hasMany(Red::className(), ['idComputadora' => 'idComputadora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSonidos()
    {
        return $this->hasMany(Sonido::className(), ['idComputadora' => 'idComputadora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeclados()
    {
        return $this->hasMany(Teclado::className(), ['idComputadora' => 'idComputadora']);
    }

    #Metodos auxiliar para mostrar datos en un DetailView de una relacion
    public function  getData($data)
    {
        return Local::find()->where(['id_local' => $data])->one();
        #return $result->departamento;
    }
}



