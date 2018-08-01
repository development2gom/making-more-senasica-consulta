<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_firmas_imagenes".
 *
 * @property int $id_firma_imagen
 * @property int $id_acta_retencion
 * @property string $txt_firmado_por
 * @property string $txt_url
 *
 * @property WrkActasRetencion $actaRetencion
 */
class EntFirmasImagenes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ent_firmas_imagenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_acta_retencion'], 'required'],
            [['id_acta_retencion'], 'integer'],
            [['txt_firmado_por', 'txt_url'], 'string', 'max' => 200],
            [['id_acta_retencion'], 'exist', 'skipOnError' => true, 'targetClass' => WrkActasRetencion::className(), 'targetAttribute' => ['id_acta_retencion' => 'id_acta_retencion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_firma_imagen' => 'Id Firma Imagen',
            'id_acta_retencion' => 'Id Acta Retencion',
            'txt_firmado_por' => 'Txt Firmado Por',
            'txt_url' => 'Txt Url',
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
