<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contenidos".
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $descripcion
 * @property string|null $tipo
 * @property string|null $fecha_estreno
 * @property int|null $duracion
 * @property string|null $clasificacion
 *
 * @property Actores[] $actors
 * @property ContenidoActor[] $contenidoActors
 * @property ContenidoGenero[] $contenidoGeneros
 * @property Generos[] $generos
 * @property Valoraciones[] $valoraciones
 * @property Visualizaciones[] $visualizaciones
 */
class Contenidos extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const TIPO_PELICULA = 'pelicula';
    const TIPO_SERIE = 'serie';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contenidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'descripcion', 'tipo', 'fecha_estreno', 'duracion', 'clasificacion'], 'default', 'value' => null],
            [['descripcion', 'tipo'], 'string'],
            [['fecha_estreno'], 'safe'],
            [['duracion'], 'integer'],
            [['titulo'], 'string', 'max' => 255],
            [['clasificacion'], 'string', 'max' => 10],
            ['tipo', 'in', 'range' => array_keys(self::optsTipo())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'tipo' => Yii::t('app', 'Tipo'),
            'fecha_estreno' => Yii::t('app', 'Fecha Estreno'),
            'duracion' => Yii::t('app', 'Duracion'),
            'clasificacion' => Yii::t('app', 'Clasificacion'),
        ];
    }

    /**
     * Gets query for [[Actors]].
     *
     * @return \yii\db\ActiveQuery|ActoresQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actores::class, ['id' => 'actor_id'])->viaTable('contenido_actor', ['contenido_id' => 'id']);
    }

    /**
     * Gets query for [[ContenidoActors]].
     *
     * @return \yii\db\ActiveQuery|ContenidoActorQuery
     */
    public function getContenidoActors()
    {
        return $this->hasMany(ContenidoActor::class, ['contenido_id' => 'id']);
    }

    /**
     * Gets query for [[ContenidoGeneros]].
     *
     * @return \yii\db\ActiveQuery|ContenidoGeneroQuery
     */
    public function getContenidoGeneros()
    {
        return $this->hasMany(ContenidoGenero::class, ['contenido_id' => 'id']);
    }

    /**
     * Gets query for [[Generos]].
     *
     * @return \yii\db\ActiveQuery|GenerosQuery
     */
    public function getGeneros()
    {
        return $this->hasMany(Generos::class, ['id' => 'genero_id'])->viaTable('contenido_genero', ['contenido_id' => 'id']);
    }

    /**
     * Gets query for [[Valoraciones]].
     *
     * @return \yii\db\ActiveQuery|ValoracionesQuery
     */
    public function getValoraciones()
    {
        return $this->hasMany(Valoraciones::class, ['contenido_id' => 'id']);
    }

    /**
     * Gets query for [[Visualizaciones]].
     *
     * @return \yii\db\ActiveQuery|VisualizacionesQuery
     */
    public function getVisualizaciones()
    {
        return $this->hasMany(Visualizaciones::class, ['contenido_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ContenidosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContenidosQuery(get_called_class());
    }


    /**
     * column tipo ENUM value labels
     * @return string[]
     */
    public static function optsTipo()
    {
        return [
            self::TIPO_PELICULA => Yii::t('app', 'pelicula'),
            self::TIPO_SERIE => Yii::t('app', 'serie'),
        ];
    }

    /**
     * @return string
     */
    public function displayTipo()
    {
        return self::optsTipo()[$this->tipo];
    }

    /**
     * @return bool
     */
    public function isTipoPelicula()
    {
        return $this->tipo === self::TIPO_PELICULA;
    }

    public function setTipoToPelicula()
    {
        $this->tipo = self::TIPO_PELICULA;
    }

    /**
     * @return bool
     */
    public function isTipoSerie()
    {
        return $this->tipo === self::TIPO_SERIE;
    }

    public function setTipoToSerie()
    {
        $this->tipo = self::TIPO_SERIE;
    }
}
