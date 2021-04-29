<?php

use common\helpers\LangHelper;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AuctionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
            <table class="table">
                <thead>
                <tr>
                    <th><?= LangHelper::t("Лот №", " Lot № ", " Lot №"); ?></th>
                    <th><?= LangHelper::t("Название", "Название", "Название"); ?></th>
                    <th><?= LangHelper::t("Участник", "Ishtirokchi", "Participant"); ?></th>
                    <th><?= LangHelper::t(" цена:", "  narx :", "  price:"); ?></th>
                    <th><?= LangHelper::t("Дата окончания", "Tugash muddati", "Expiration date"); ?><</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($auctions as $auction):?>
                <tr>

                    <td><?=$auction->id?></td>
                    <td><?=$auction->title_ru?></td>
                    <td><?=$auction->username?></td>
                    <td><?=$auction->price?></td>
                    <td><?=$auction->date?></td>
                </tr>
                <?php endforeach;?>

                </tbody>
            </table>

