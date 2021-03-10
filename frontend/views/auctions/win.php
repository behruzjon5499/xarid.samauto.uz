<?php

use common\models\Auctions;
use common\models\UserAuctions;

/* @var $auction Auctions
 * @var $auctions Auctions
 * @var $countss Auctions
 * @var $userauctions UserAuctions
 */

?>
<?php

//\yii\helpers\VarDumper::dump($userauctions,12,true);
////die();
?>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="text-align: center; margin-top: 100px;">
            <h2>  <?= $userauctions->user->username ?></h2>
            <h2 style="color: red;">Вы выиграли лот :<?= $userauctions->auction->id ?> </h2>
            <img src="/img/22.jpg" style="width: 100%; height: 400px;" alt="">

        </div>
        <div class="col-md-2"></div>
    </div>
</div>



