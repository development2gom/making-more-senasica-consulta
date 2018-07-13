<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_tipos_actas".
 *
 * @property int $id_tipo_acta
 * @property string $uddi
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property int $b_habilitado
 */
class CatTiposActas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_tipos_actas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['b_habilitado'], 'integer'],
            [['uddi', 'txt_nombre', 'txt_descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_acta' => 'Id Tipo Acta',
            'uddi' => 'Uddi',
            'txt_nombre' => 'Txt Nombre',
            'txt_descripcion' => 'Txt Descripcion',
            'b_habilitado' => 'B Habilitado',
        ];
    }
}
