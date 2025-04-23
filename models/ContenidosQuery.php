<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Contenidos]].
 *
 * @see Contenidos
 */
class ContenidosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Contenidos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Contenidos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
