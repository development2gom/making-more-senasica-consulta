<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_oficiales".
 *
 * @property string $id_oficial
 * @property string $uddi
 * @property string $txt_nombre_usuario
 * @property string $txt_contrasena
 * @property string $fch_creacion
 * @property string $txt_oisa
 * @property string $txt_nombre
 * @property string $txt_apellido_paterno
 * @property string $txt_apellido_materno
 * @property string $txt_rol
 * @property string $txt_clave_tea
 * @property string $txt_curp
 * @property string $txt_rfc
 * @property int $b_habilitado
 *
 * @property TmpSesionesOficilaes $tmpSesionesOficilaes
 * @property WrkActasRetencion[] $wrkActasRetencions
 */
class EntOficiales extends \yii\db\ActiveRecord
{
    
    const STATUS_ACTIVED = 1;
    const STATUS_BLOCKED = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_oficiales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uddi', 'txt_nombre_usuario', 'txt_contrasena', 'txt_oisa', 'txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_rol', 'txt_clave_tea', 'txt_curp', 'txt_rfc', 'b_habilitado'], 'required'],
            [['fch_creacion'], 'safe'],
            [['txt_curp'],'string','max' => 18,'message' => 'La curp no cuenta con los 18 caracteres'],
            [['txt_rfc'],'string','max' => 13,'min' => 12,'tooLong' => 'El campo no debe superar 13 dígitos','tooShort' => 'El campo debe ser mínimo de 12 digítos'],
            ['txt_rfc', 'match', 'pattern' => '/^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/', "message" => "RFC no válido"],
			['txt_curp', 'match', 'pattern' => '/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/', "message" => "CURP no válido"],
            ['txt_contrasena','trim'],
            ['txt_clave_tea','trim'],
            [['b_habilitado'], 'integer'],
            [['uddi'], 'string', 'max' => 100],
            [['txt_nombre_usuario', 'txt_contrasena', 'txt_oisa', 'txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_rol', 'txt_clave_tea', 'txt_curp', 'txt_rfc'], 'string', 'max' => 45],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_oficial' => 'Id Oficial',
            'uddi' => 'Uddi',
            'txt_nombre_usuario' => 'Usuario',
            'txt_contrasena' => 'Contraseña',
            'fch_creacion' => 'Fch Creacion',
            'txt_oisa' => 'Oisa',
            'txt_nombre' => 'Nombre',
            'txt_apellido_paterno' => 'Apellido Paterno',
            'txt_apellido_materno' => 'Apellido Materno',
            'txt_rol' => 'Rol',
            'txt_clave_tea' => 'Clave Tea',
            'txt_curp' => 'Curp',
            'txt_rfc' => 'Rfc',
            'b_habilitado' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmpSesionesOficilaes()
    {
        return $this->hasOne(TmpSesionesOficilaes::className(), ['id_oficial' => 'id_oficial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkActasRetencions()
    {
        return $this->hasMany(WrkActasRetencion::className(), ['id_oficial' => 'id_oficial']);
    }

    public function getNombreCompleto(){
        return $this->txt_nombre." ".$this->txt_apellido_paterno." ".$this->txt_apellido_materno;
    }
}
