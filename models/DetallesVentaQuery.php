<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DetallesVenta]].
 *
 * @see DetallesVenta
 */
class DetallesVentaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DetallesVenta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DetallesVenta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
