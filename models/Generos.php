<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generos".
 *
 * @property int $id
 * @property string|null $nombre
 *
 * @property ContenidoGenero[] $contenidoGeneros
 * @property Contenidos[] $contenidos
 */
class Generos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'default', 'value' => null],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * Gets query for [[ContenidoGeneros]].
     *
     * @return \yii\db\ActiveQuery|ContenidoGeneroQuery
     */
    public function getContenidoGeneros()
    {
        return $this->hasMany(ContenidoGenero::class, ['genero_id' => 'id']);
    }

    /**
     * Gets query for [[Contenidos]].
     *
     * @return \yii\db\ActiveQuery|ContenidosQuery
     */
    public function getContenidos()
    {
        return $this->hasMany(Contenidos::class, ['id' => 'contenido_id'])->viaTable('contenido_genero', ['genero_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return GenerosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GenerosQuery(get_called_class());
    }

}
