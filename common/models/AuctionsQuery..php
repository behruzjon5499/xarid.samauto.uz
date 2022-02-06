<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[\common\models\Auctions]].
 *
 * @see \common\models\Auctions
 */
class AuctionsQuery extends \yii\db\ActiveQuery
{

    /**
     * {@inheritdoc}
     * @return Auctions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Auctions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
