<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'Usuarios';
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id_usuario' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Si tienes un campo access_token, ponlo aquí. Si no, puedes omitir este método
        return null;
    }

    public static function findByUsername($username)
    {
        // Aquí usamos 'correo' como el username para login
        return static::findOne(['correo' => $username]);
    }

    public function getId()
    {
        return $this->id_usuario;
    }

    public function getAuthKey()
    {
        // Si no tienes auth_key, puedes retornar null o agregar un campo auth_key
        return null;
    }

    public function validateAuthKey($authKey)
    {
        // Si no usas auth_key, retorna siempre true
        return true;
    }

    public function validatePassword($password)
    {
        // Si guardas la contraseña en texto plano (NO recomendado)
        return $this->contraseña === $password;

        // Si usas hash:
        // return Yii::$app->security->validatePassword($password, $this->contraseña);
    }
    public static function findByCorreo($correo)
{
    return static::findOne(['correo' => $correo]);
}
}