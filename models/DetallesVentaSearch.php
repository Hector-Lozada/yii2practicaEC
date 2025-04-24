<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetallesVenta;

/**
 * DetallesVentaSearch represents the model behind the search form of `app\models\DetallesVenta`.
 */
class DetallesVentaSearch extends DetallesVenta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddetalles', 'venta_id', 'producto_id', 'cantidad'], 'integer'],
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
        $query = DetallesVenta::find();

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
            'iddetalles' => $this->iddetalles,
            'venta_id' => $this->venta_id,
            'producto_id' => $this->producto_id,
            'cantidad' => $this->cantidad,
            'precio_unitario' => $this->precio_unitario,
        ]);

        return $dataProvider;
    }
}
