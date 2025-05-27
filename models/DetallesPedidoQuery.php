<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DetallesPedido]].
 *
 * @see DetallesPedido
 */
class DetallesPedidoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DetallesPedido[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DetallesPedido|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
