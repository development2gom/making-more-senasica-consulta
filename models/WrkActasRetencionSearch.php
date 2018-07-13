<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WrkActasRetencion;

/**
 * WrkActasRetencionSearch represents the model behind the search form of `app\models\WrkActasRetencion`.
 */
class WrkActasRetencionSearch extends WrkActasRetencion
{
    public $startDate;
    public $endDate;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_acta_retencion', 'id_oficial', 'data'], 'integer'],
            [['uddi', 'txt_folio',"startDate","endDate", 'txt_fecha', 'txt_oficina', 'txt_tipo_identificacion', 'txt_numero_identificacion', 'txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_nacionalidad', 'txt_correo', 'txt_estado', 'txt_municipio', 'txt_calle', 'txt_numero', 'txt_tipo_acta', 'txt_pais_origen', 'txt_pais_procedencia', 'txt_tipo_mercancia', 'txt_cantidad', 'txt_unidad_medida', 'txt_descripcion_hechos', 'txt_detectado_por', 'txt_dictamen', 'txt_nombre_verificador_tea', 'txt_clave_verificador_tea', 'txt_nombre_completo_oficial'], 'safe'],
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
        $query = WrkActasRetencion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_acta_retencion' => $this->id_acta_retencion,
            'id_oficial' => $this->id_oficial,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'uddi', $this->uddi])
            ->andFilterWhere(['like', 'txt_folio', $this->txt_folio])
            ->andFilterWhere(['like', 'txt_fecha', $this->txt_fecha])
            ->andFilterWhere(['like', 'txt_oficina', $this->txt_oficina])
            ->andFilterWhere(['like', 'txt_tipo_identificacion', $this->txt_tipo_identificacion])
            ->andFilterWhere(['like', 'txt_numero_identificacion', $this->txt_numero_identificacion])
            ->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_apellido_paterno', $this->txt_apellido_paterno])
            ->andFilterWhere(['like', 'txt_apellido_materno', $this->txt_apellido_materno])
            ->andFilterWhere(['like', 'txt_nacionalidad', $this->txt_nacionalidad])
            ->andFilterWhere(['like', 'txt_correo', $this->txt_correo])
            ->andFilterWhere(['like', 'txt_estado', $this->txt_estado])
            ->andFilterWhere(['like', 'txt_municipio', $this->txt_municipio])
            ->andFilterWhere(['like', 'txt_calle', $this->txt_calle])
            ->andFilterWhere(['like', 'txt_numero', $this->txt_numero])
            ->andFilterWhere(['like', 'txt_tipo_acta', $this->txt_tipo_acta])
            ->andFilterWhere(['like', 'txt_pais_origen', $this->txt_pais_origen])
            ->andFilterWhere(['like', 'txt_pais_procedencia', $this->txt_pais_procedencia])
            ->andFilterWhere(['like', 'txt_tipo_mercancia', $this->txt_tipo_mercancia])
            ->andFilterWhere(['like', 'txt_cantidad', $this->txt_cantidad])
            ->andFilterWhere(['like', 'txt_unidad_medida', $this->txt_unidad_medida])
            ->andFilterWhere(['like', 'txt_descripcion_hechos', $this->txt_descripcion_hechos])
            ->andFilterWhere(['like', 'txt_detectado_por', $this->txt_detectado_por])
            ->andFilterWhere(['like', 'txt_dictamen', $this->txt_dictamen])
            ->andFilterWhere(['like', 'txt_nombre_verificador_tea', $this->txt_nombre_verificador_tea])
            ->andFilterWhere(['like', 'txt_clave_verificador_tea', $this->txt_clave_verificador_tea])
            ->andFilterWhere(['like', 'txt_nombre_completo_oficial', $this->txt_nombre_completo_oficial]);

        return $dataProvider;
    }
}
