<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $idclientes
 * @property string|null $nombre
 * @property string|null $email
 * @property string|null $direccion
 * @property string|null $telefono
 *
 * @property Ventas[] $ventas
 */
class Clientes extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'email', 'direccion', 'telefono'], 'default', 'value' => null],
            [['nombre', 'email'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idclientes' => Yii::t('app', 'Idclientes'),
            'nombre' => Yii::t('app', 'Nombre'),
            'email' => Yii::t('app', 'Email'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
        ];
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery|VentasQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::class, ['cliente_id' => 'idclientes']);
    }

    /**
     * {@inheritdoc}
     * @return ClientesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientesQuery(get_called_class());
    }

}
