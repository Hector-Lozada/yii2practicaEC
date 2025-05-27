<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Pedidos".
 *
 * @property int $id_pedido
 * @property int|null $id_usuario
 * @property string $fecha_pedido
 * @property string $estado
 * @property float|null $total
 *
 * @property DetallesPedido[] $detallesPedidos
 * @property Usuarios $usuario
 */
class Pedidos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'total'], 'default', 'value' => null],
            [['id_usuario'], 'integer'],
            [['fecha_pedido', 'estado'], 'required'],
            [['fecha_pedido'], 'safe'],
            [['total'], 'number'],
            [['estado'], 'string', 'max' => 50],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pedido' => Yii::t('app', 'Id Pedido'),
            'id_usuario' => Yii::t('app', 'Id Usuario'),
            'fecha_pedido' => Yii::t('app', 'Fecha Pedido'),
            'estado' => Yii::t('app', 'Estado'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * Gets query for [[DetallesPedidos]].
     *
     * @return \yii\db\ActiveQuery|DetallesPedidoQuery
     */
    public function getDetallesPedidos()
    {
        return $this->hasMany(DetallesPedido::class, ['id_pedido' => 'id_pedido']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|UsuariosQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::class, ['id_usuario' => 'id_usuario']);
    }

    /**
     * {@inheritdoc}
     * @return PedidosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PedidosQuery(get_called_class());
    }

}
