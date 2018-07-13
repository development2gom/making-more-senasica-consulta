<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_estados".
 *
 * @property int $id_estado
 * @property string $uddi
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property int $b_habilitado
 */
class CatEstados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_estados';
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
            'id_estado' => 'Id Estado',
            'uddi' => 'Uddi',
            'txt_nombre' => 'Txt Nombre',
            'txt_descripcion' => 'Txt Descripcion',
            'b_habilitado' => 'B Habilitado',
        ];
    }
}
