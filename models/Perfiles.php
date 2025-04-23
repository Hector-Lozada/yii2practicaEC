<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfiles".
 *
 * @property int $id
 * @property string|null $nombre
 * @property int|null $edad
 * @property int|null $usuario_id
 *
 * @property Usuarios $usuario
 * @property Valoraciones[] $valoraciones
 * @property Visualizaciones[] $visualizaciones
 */
class Perfiles extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'edad', 'usuario_id'], 'default', 'value' => null],
            [['edad', 'usuario_id'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['usuario_id' => 'id']],
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
            'edad' => Yii::t('app', 'Edad'),
            'usuario_id' => Yii::t('app', 'Usuario ID'),
        ];
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|UsuariosQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::class, ['id' => 'usuario_id']);
    }

    /**
     * Gets query for [[Valoraciones]].
     *
     * @return \yii\db\ActiveQuery|ValoracionesQuery
     */
    public function getValoraciones()
    {
        return $this->hasMany(Valoraciones::class, ['perfil_id' => 'id']);
    }

    /**
     * Gets query for [[Visualizaciones]].
     *
     * @return \yii\db\ActiveQuery|VisualizacionesQuery
     */
    public function getVisualizaciones()
    {
        return $this->hasMany(Visualizaciones::class, ['perfil_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PerfilesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PerfilesQuery(get_called_class());
    }

}
