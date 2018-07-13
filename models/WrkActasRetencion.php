<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wrk_actas_retencion".
 *
 * @property int $id_acta_retencion
 * @property int $id_oficial
 * @property string $uddi
 * @property string $txt_folio
 * @property string $txt_fecha
 * @property string $txt_oficina
 * @property string $txt_tipo_identificacion
 * @property string $txt_numero_identificacion
 * @property string $txt_nombre
 * @property string $txt_apellido_paterno
 * @property string $txt_apellido_materno
 * @property string $txt_nacionalidad
 * @property string $txt_correo
 * @property string $txt_estado
 * @property string $txt_municipio
 * @property string $txt_calle
 * @property string $txt_numero
 * @property string $txt_tipo_acta
 * @property string $txt_pais_origen
 * @property string $txt_pais_procedencia
 * @property string $txt_tipo_mercancia
 * @property string $txt_cantidad
 * @property string $txt_unidad_medida
 * @property string $txt_descripcion_hechos
 * @property string $txt_detectado_por
 * @property string $txt_dictamen
 * @property string $txt_nombre_verificador_tea
 * @property string $txt_clave_verificador_tea
 * @property string $txt_nombre_completo_oficial
 * @property int $data
 *
 * @property EntEfirmas[] $entEfirmas
 * @property EntFirmasImagenes[] $entFirmasImagenes
 * @property EntImagenes[] $entImagenes
 * @property EntOficiales $oficial
 */
class WrkActasRetencion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wrk_actas_retencion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_oficial', 'uddi', 'txt_folio', 'txt_fecha', 'txt_oficina', 'txt_tipo_identificacion', 'txt_numero_identificacion', 'txt_nombre', 'txt_apellido_paterno', 'txt_nacionalidad', 'txt_correo', 'txt_estado', 'txt_municipio', 'txt_calle', 'txt_numero', 'txt_tipo_acta', 'txt_pais_origen', 'txt_pais_procedencia', 'txt_tipo_mercancia', 'txt_cantidad', 'txt_unidad_medida', 'txt_descripcion_hechos', 'txt_detectado_por', 'txt_dictamen', 'txt_nombre_verificador_tea', 'txt_clave_verificador_tea', 'txt_nombre_completo_oficial'], 'required'],
            [['id_oficial', 'data'], 'integer'],
            [['uddi', 'txt_correo'], 'string', 'max' => 100],
            [['txt_folio', 'txt_fecha', 'txt_oficina', 'txt_tipo_identificacion', 'txt_numero_identificacion', 'txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_nacionalidad', 'txt_estado', 'txt_municipio', 'txt_calle', 'txt_numero', 'txt_tipo_acta', 'txt_pais_origen', 'txt_pais_procedencia', 'txt_tipo_mercancia', 'txt_cantidad', 'txt_unidad_medida', 'txt_detectado_por', 'txt_dictamen', 'txt_nombre_verificador_tea', 'txt_clave_verificador_tea', 'txt_nombre_completo_oficial'], 'string', 'max' => 45],
            [['txt_descripcion_hechos'], 'string', 'max' => 2500],
            [['id_oficial'], 'exist', 'skipOnError' => true, 'targetClass' => EntOficiales::className(), 'targetAttribute' => ['id_oficial' => 'id_oficial']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_acta_retencion' => 'Id Acta Retencion',
            'id_oficial' => 'Oficial',
            'uddi' => 'Uddi',
            'txt_folio' => 'Folio',
            'txt_fecha' => 'Fecha',
            'txt_oficina' => 'Oficina',
            'txt_tipo_identificacion' => 'Tipo Identificacion',
            'txt_numero_identificacion' => 'Numero Identificacion',
            'txt_nombre' => 'Nombre',
            'txt_apellido_paterno' => 'Apellido paterno',
            'txt_apellido_materno' => 'Apellido materno',
            'txt_nacionalidad' => 'Nacionalidad',
            'txt_correo' => 'Correo',
            'txt_estado' => 'Estado',
            'txt_municipio' => 'Municipio',
            'txt_calle' => 'Calle',
            'txt_numero' => 'Numero',
            'txt_tipo_acta' => 'Tipo acta',
            'txt_pais_origen' => 'Pais origen',
            'txt_pais_procedencia' => 'Pais procedencia',
            'txt_tipo_mercancia' => 'Tipo mercancia',
            'txt_cantidad' => 'Cantidad',
            'txt_unidad_medida' => 'Unidad medida',
            'txt_descripcion_hechos' => 'Descripcion Hechos',
            'txt_detectado_por' => 'Detectado Por',
            'txt_dictamen' => 'Dictamen',
            'txt_nombre_verificador_tea' => 'Nombre Verificador Tea',
            'txt_clave_verificador_tea' => 'Clave Verificador Tea',
            'txt_nombre_completo_oficial' => 'Nombre Completo Oficial',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntEfirmas()
    {
        return $this->hasMany(EntEfirmas::className(), ['id_acta_retencion' => 'id_acta_retencion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntFirmasImagenes()
    {
        return $this->hasMany(EntFirmasImagenes::className(), ['id_acta_retencion' => 'id_acta_retencion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntImagenes()
    {
        return $this->hasMany(EntImagenes::className(), ['id_acta_retencion' => 'id_acta_retencion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOficial()
    {
        return $this->hasOne(EntOficiales::className(), ['id_oficial' => 'id_oficial']);
    }
}
