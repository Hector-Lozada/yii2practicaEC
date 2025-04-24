<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $idproductos
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property float|null $precio
 * @property int|null $stock
 *
 * @property DetallesVenta[] $detallesVentas
 */
class Productos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'precio', 'stock'], 'default', 'value' => null],
            [['descripcion'], 'string'],
            [['precio'], 'number'],
            [['stock'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idproductos' => Yii::t('app', 'Idproductos'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'precio' => Yii::t('app', 'Precio'),
            'stock' => Yii::t('app', 'Stock'),
        ];
    }

    /**
     * Gets query for [[DetallesVentas]].
     *
     * @return \yii\db\ActiveQuery|DetallesVentaQuery
     */
    public function getDetallesVentas()
    {
        return $this->hasMany(DetallesVenta::class, ['producto_id' => 'idproductos']);
    }

    /**
     * {@inheritdoc}
     * @return ProductosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductosQuery(get_called_class());
    }

}
