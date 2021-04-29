<?php

namespace backend\services;

use backend\models\AuctionView;
use common\models\Auctions;
use common\models\User;
use common\models\UserAuctions;

class AuctionService
{

    public function getAuction()
    {
        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);
        $auctions = Auctions::find()->where(['<', 'end_date', $t])->all();
        $Userauction = [];
        if ($auctions) {
            foreach ($auctions as $auction):
                $model = new AuctionView();

                $model->id = $auction->id;
                $model->title_ru = $auction->title_ru;
                $model->title_uz = $auction->title_uz;
                $model->title_en = $auction->title_en;
                $user_auctions = UserAuctions::find()->where(['auction_id' => $auction->id])->orderBy(['price' => SORT_DESC])->limit(1)->one();

                $user = $user_auctions ? User::find()->where(['id'=>$user_auctions->user_id])->one():'';
                $model->username = $user ? $user->username : '';
                $model->price = $user_auctions ? $user_auctions->price : "narx qoyilmagan";
                $model->date = $auction->end_date ? date('F d, Y H:i:s', $auction->end_date) : '';
                $Userauction[] = $model;
            endforeach;

        }
        return $Userauction;
    }


}