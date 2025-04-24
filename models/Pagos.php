<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagos".
 *
 * @property int $idpagos
 * @property int|null $venta_id
 * @property string|null $metodo_pago
 * @property float|null $monto
 * @property string|null $fecha_pago
 *
 * @property Ventas $venta
 */
class Pagos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['venta_id', 'metodo_pago', 'monto', 'fecha_pago'], 'default', 'value' => null],
            [['venta_id'], 'integer'],
            [['monto'], 'number'],
            [['fecha_pago'], 'safe'],
            [['metodo_pago'], 'string', 'max' => 50],
            [['venta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ventas::class, 'targetAttribute' => ['venta_id' => 'idventas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpagos' => Yii::t('app', 'Idpagos'),
            'venta_id' => Yii::t('app', 'Venta ID'),
            'metodo_pago' => Yii::t('app', 'Metodo Pago'),
            'monto' => Yii::t('app', 'Monto'),
            'fecha_pago' => Yii::t('app', 'Fecha Pago'),
        ];
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
     * @return PagosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagosQuery(get_called_class());
    }

}
