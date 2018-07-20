<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_efirmas".
 *
 * @property int $id_efirma
 * @property int $id_acta_retencion
 * @property string $txt_cadena_original
 * @property string $txt_firma
 * @property string $txt_certificado
 * @property string $fch_recepcion
 * @property string $txt_serie_certificado
 *
 * @property WrkActasRetencion $actaRetencion
 */
class EntEfirmas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ent_efirmas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_acta_retencion', 'txt_cadena_original', 'txt_firma', 'txt_certificado', 'txt_serie_certificado'], 'required'],
            [['id_acta_retencion'], 'integer'],
            [['txt_cadena_original', 'txt_firma', 'txt_certificado'], 'string'],
            [['fch_recepcion'], 'safe'],
            [['txt_serie_certificado'], 'string', 'max' => 45],
            [['id_acta_retencion'], 'exist', 'skipOnError' => true, 'targetClass' => WrkActasRetencion::className(), 'targetAttribute' => ['id_acta_retencion' => 'id_acta_retencion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_efirma' => 'Id Efirma',
            'id_acta_retencion' => 'Id Acta Retencion',
            'txt_cadena_original' => 'Txt Cadena Original',
            'txt_firma' => 'Txt Firma',
            'txt_certificado' => 'Txt Certificado',
            'fch_recepcion' => 'Fch Recepcion',
            'txt_serie_certificado' => 'Txt Serie Certificado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActaRetencion()
    {
        return $this->hasOne(WrkActasRetencion::className(), ['id_acta_retencion' => 'id_acta_retencion']);
    }
}
