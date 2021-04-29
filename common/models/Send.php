<?php
namespace common\models;


use Yii;
use yii\base\BaseObject;

class Send extends BaseObject implements \yii\queue\JobInterface
{

    /**
     * @inheritDoc
     */
    public function execute($queue)
    {
        $faker = \Faker\Factory::create();

        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);
        $auctions = Auctions::find()->where(['<', 'end_date', $t])->andWhere(['status' => 10])->orderBy(['id'=>SORT_DESC])->limit(1)->one();
//
//        foreach($auctions as $auction):
//            $userauctions = UserAuctions::find()->where(['auction_id'=>$auction->id])->one();
            Yii::$app
                ->mailer
                ->compose(['html' => 'win/confirm-html', 'text' => 'win/confirm-text'])
                ->setFrom('no-reply@samauto.uz')
                ->setTo('behruztoxirov909515499@gmail.com')
                ->setSubject('sizning Auksioninggiz  bo`yicha ')
                ->send();
            Yii::$app->session->setFlash('success', 'Ваш запрос успешно отправлен');
            $auctionss = Yii::$app->db->createCommand()
                ->update('auction', ['status' => 0], ['id' => $auctions->id])
                ->execute();
//        endforeach;

    }
}


