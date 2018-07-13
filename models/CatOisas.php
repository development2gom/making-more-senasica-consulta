<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_oisas".
 *
 * @property int $id_oisas
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property int $b_habilitado
 *
 * @property ModUsuariosEntUsuarios[] $modUsuariosEntUsuarios
 */
class CatOisas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_oisas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_descripcion'], 'string'],
            [['b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_oisas' => 'Id Oisas',
            'txt_nombre' => 'Txt Nombre',
            'txt_descripcion' => 'Txt Descripcion',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModUsuariosEntUsuarios()
    {
        return $this->hasMany(ModUsuariosEntUsuarios::className(), ['id_oisa' => 'id_oisas']);
    }
}
