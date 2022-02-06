<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[\common\models\UserAuctions]].
 *
 * @see \common\models\UserAuctions
 */
class UserAuctionsQuery extends \yii\db\ActiveQuery
{

    /**
     * {@inheritdoc}
     * @return UserAuctions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserAuctions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
