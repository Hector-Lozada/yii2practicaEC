<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Categorias".
 *
 * @property int $id_categoria
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Productos[] $productos
 */
class Categorias extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'default', 'value' => null],
            [['nombre'], 'required'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => Yii::t('app', 'Id Categoria'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery|ProductosQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::class, ['id_categoria' => 'id_categoria']);
    }

    /**
     * {@inheritdoc}
     * @return CategoriasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriasQuery(get_called_class());
    }

}
