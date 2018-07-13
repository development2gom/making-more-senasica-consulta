<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntOficiales;

/**
 * EntOficialesSearch represents the model behind the search form of `app\models\EntOficiales`.
 */
class EntOficialesSearch extends EntOficiales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_oficial', 'b_habilitado'], 'integer'],
            [['uddi', 'txt_nombre_usuario', 'txt_contrasena', 'fch_creacion', 'txt_oisa', 'txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_rol', 'txt_clave_tea', 'txt_curp', 'txt_rfc'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EntOficiales::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_oficial' => $this->id_oficial,
            'fch_creacion' => $this->fch_creacion,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'uddi', $this->uddi])
            ->andFilterWhere(['like', 'txt_nombre_usuario', $this->txt_nombre_usuario])
            ->andFilterWhere(['like', 'txt_contrasena', $this->txt_contrasena])
            ->andFilterWhere(['like', 'txt_oisa', $this->txt_oisa])
            ->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_apellido_paterno', $this->txt_apellido_paterno])
            ->andFilterWhere(['like', 'txt_apellido_materno', $this->txt_apellido_materno])
            ->andFilterWhere(['like', 'txt_rol', $this->txt_rol])
            ->andFilterWhere(['like', 'txt_clave_tea', $this->txt_clave_tea])
            ->andFilterWhere(['like', 'txt_curp', $this->txt_curp])
            ->andFilterWhere(['like', 'txt_rfc', $this->txt_rfc]);

        return $dataProvider;
    }
}
