<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventas".
 *
 * @property int $idventas
 * @property int|null $cliente_id
 * @property string|null $fecha
 * @property float|null $total
 *
 * @property Clientes $cliente
 * @property DetallesVenta[] $detallesVentas
 * @property Pagos[] $pagos
 */
class Ventas extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ventas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'fecha', 'total'], 'default', 'value' => null],
            [['cliente_id'], 'integer'],
            [['fecha'], 'safe'],
            [['total'], 'number'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['cliente_id' => 'idclientes']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idventas' => Yii::t('app', 'Idventas'),
            'cliente_id' => Yii::t('app', 'Cliente ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery|ClientesQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::class, ['idclientes' => 'cliente_id']);
    }

    /**
     * Gets query for [[DetallesVentas]].
     *
     * @return \yii\db\ActiveQuery|DetallesVentaQuery
     */
    public function getDetallesVentas()
    {
        return $this->hasMany(DetallesVenta::class, ['venta_id' => 'idventas']);
    }

    /**
     * Gets query for [[Pagos]].
     *
     * @return \yii\db\ActiveQuery|PagosQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::class, ['venta_id' => 'idventas']);
    }

    /**
     * {@inheritdoc}
     * @return VentasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VentasQuery(get_called_class());
    }

}
