<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "Productos".
 *
 * @property int $id_producto
 * @property string $nombre
 * @property string|null $descripcion
 * @property float $precio
 * @property int $stock
 * @property int|null $id_categoria
 * @property string|null $imagen_url
 *
 * @property Categorias $categoria
 * @property DetallesPedido[] $detallesPedidos
 */
class Productos extends \yii\db\ActiveRecord
{
    public $imagenFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'id_categoria', 'imagen_url'], 'default', 'value' => null],
            [['nombre', 'precio', 'stock'], 'required'],
            [['descripcion'], 'string'],
            [['precio'], 'number'],
            [['stock', 'id_categoria'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['imagen_url'], 'string', 'max' => 255],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['id_categoria' => 'id_categoria']],
            [['imagenFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'maxSize' => 1024 * 1024 * 2], // 2MB
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => Yii::t('app', 'Id Producto'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'precio' => Yii::t('app', 'Precio'),
            'stock' => Yii::t('app', 'Stock'),
            'id_categoria' => Yii::t('app', 'Id Categoria'),
            'imagen_url' => Yii::t('app', 'Imagen Url'),
            'imagenFile' => Yii::t('app', 'Imagen del producto'),
        ];
    }

    /**
     * Upload and process the product image
     * @return bool whether the file was uploaded successfully
     */
    public function uploadImage()
    {
        if ($this->imagenFile) {
            // Create directory if it doesn't exist
            $uploadPath = Yii::getAlias('@webroot/uploads/productos');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Generate a unique file name
            $fileName = uniqid('producto_') . '.' . $this->imagenFile->extension;

            // Save the file
            if ($this->imagenFile->saveAs($uploadPath . '/' . $fileName)) {
                // Save the relative path in the database
                $this->imagen_url = '/uploads/productos/' . $fileName;
                return true;
            }
        }
        return false;
    }

    /**
     * Before delete, remove the image file
     */
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }

        // Delete the image file if it exists
        if ($this->imagen_url) {
            $filePath = Yii::getAlias('@webroot') . $this->imagen_url;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        return true;
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery|CategoriasQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::class, ['id_categoria' => 'id_categoria']);
    }

    /**
     * Gets query for [[DetallesPedidos]].
     *
     * @return \yii\db\ActiveQuery|DetallesPedidoQuery
     */
    public function getDetallesPedidos()
    {
        return $this->hasMany(DetallesPedido::class, ['id_producto' => 'id_producto']);
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