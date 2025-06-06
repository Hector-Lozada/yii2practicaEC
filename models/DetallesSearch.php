<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detalles;

/**
 * DetallesSearch represents the model behind the search form of `app\models\Detalles`.
 */
class DetallesSearch extends Detalles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_detalle', 'id_pedido', 'id_producto', 'cantidad'], 'integer'],
            [['precio_unitario'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Detalles::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_detalle' => $this->id_detalle,
            'id_pedido' => $this->id_pedido,
            'id_producto' => $this->id_producto,
            'cantidad' => $this->cantidad,
            'precio_unitario' => $this->precio_unitario,
        ]);

        return $dataProvider;
    }
}
