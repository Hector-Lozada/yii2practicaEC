<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actores".
 *
 * @property int $id
 * @property string|null $nombre
 *
 * @property ContenidoActor[] $contenidoActors
 * @property Contenidos[] $contenidos
 */
class Actores extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'default', 'value' => null],
            [['nombre'], 'string', 'max' => 100],
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
     * Gets query for [[ContenidoActors]].
     *
     * @return \yii\db\ActiveQuery|ContenidoActorQuery
     */
    public function getContenidoActors()
    {
        return $this->hasMany(ContenidoActor::class, ['actor_id' => 'id']);
    }

    /**
     * Gets query for [[Contenidos]].
     *
     * @return \yii\db\ActiveQuery|ContenidosQuery
     */
    public function getContenidos()
    {
        return $this->hasMany(Contenidos::class, ['id' => 'contenido_id'])->viaTable('contenido_actor', ['actor_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ActoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActoresQuery(get_called_class());
    }

}
