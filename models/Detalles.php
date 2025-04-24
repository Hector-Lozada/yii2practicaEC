<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalles_venta".
 *
 * @property int $iddetalles
 * @property int|null $venta_id
 * @property int|null $producto_id
 * @property int|null $cantidad
 * @property float|null $precio_unitario
 *
 * @property Productos $producto
 * @property Ventas $venta
 */
class Detalles extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalles_venta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['venta_id', 'producto_id', 'cantidad', 'precio_unitario'], 'default', 'value' => null],
            [['venta_id', 'producto_id', 'cantidad'], 'integer'],
            [['precio_unitario'], 'number'],
            [['venta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ventas::class, 'targetAttribute' => ['venta_id' => 'idventas']],
            [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::class, 'targetAttribute' => ['producto_id' => 'idproductos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddetalles' => Yii::t('app', 'Iddetalles'),
            'venta_id' => Yii::t('app', 'Venta ID'),
            'producto_id' => Yii::t('app', 'Producto ID'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'precio_unitario' => Yii::t('app', 'Precio Unitario'),
        ];
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery|ProductosQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::class, ['idproductos' => 'producto_id']);
    }

    /**
     * Gets query for [[Venta]].
     *
     * @return \yii\db\ActiveQuery|VentasQuery
     */
    public function getVenta()
    {
        return $this->hasOne(Ventas::class, ['idventas' => 'venta_id']);
    }

    /**
     * {@inheritdoc}
     * @return DetallesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetallesQuery(get_called_class());
    }

}
