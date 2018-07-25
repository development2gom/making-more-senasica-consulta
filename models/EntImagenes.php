<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_imagenes".
 *
 * @property int $id_imagen
 * @property int $id_acta_retencion
 * @property string $txt_url
 *
 * @property WrkActasRetencion $actaRetencion
 */
class EntImagenes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ent_imagenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_acta_retencion'], 'required'],
            [['id_acta_retencion'], 'integer'],
            [['txt_url'], 'string', 'max' => 200],
            [['id_acta_retencion'], 'exist', 'skipOnError' => true, 'targetClass' => WrkActasRetencion::className(), 'targetAttribute' => ['id_acta_retencion' => 'id_acta_retencion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_imagen' => 'Id Imagen',
            'id_acta_retencion' => 'Id Acta Retencion',
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
