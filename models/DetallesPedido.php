<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DetallesPedido".
 *
 * @property int $id_detalle
 * @property int|null $id_pedido
 * @property int|null $id_producto
 * @property int $cantidad
 * @property float $precio_unitario
 *
 * @property Pedidos $pedido
 * @property Productos $producto
 */
class DetallesPedido extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'DetallesPedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pedido', 'id_producto'], 'default', 'value' => null],
            [['id_pedido', 'id_producto', 'cantidad'], 'integer'],
            [['cantidad', 'precio_unitario'], 'required'],
            [['precio_unitario'], 'number'],
            [['id_pedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::class, 'targetAttribute' => ['id_pedido' => 'id_pedido']],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::class, 'targetAttribute' => ['id_producto' => 'id_producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detalle' => Yii::t('app', 'Id Detalle'),
            'id_pedido' => Yii::t('app', 'Id Pedido'),
            'id_producto' => Yii::t('app', 'Id Producto'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'precio_unitario' => Yii::t('app', 'Precio Unitario'),
        ];
    }

    /**
     * Gets query for [[Pedido]].
     *
     * @return \yii\db\ActiveQuery|PedidosQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedidos::class, ['id_pedido' => 'id_pedido']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery|ProductosQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::class, ['id_producto' => 'id_producto']);
    }

    /**
     * {@inheritdoc}
     * @return DetallesPedidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetallesPedidoQuery(get_called_class());
    }

}
