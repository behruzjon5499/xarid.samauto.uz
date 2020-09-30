<?php

use abdualiym\cms\entities\Menu;
use abdualiym\language\Language;
use backend\models\Cart;

/**
 *
 * @var $menu Menu
 */
$url = Yii::$app->language;

$card = Cart::find();
$session_id = Yii::$app->session->id;
$card->orWhere(['session_id' => $session_id]);
$count = $card->sum("count");

?>


<header class="fixed-top header-fullpage top-border top-transparent wow fadeInDown">
    <div class="top-bar-right d-flex align-items-center text-md-left">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <i class="icofont-google-map"></i>  Toshkent Shaxar Mirzo Ulugbek ziyolilar ko'chasi
                </div>
                <div class="col-md-auto">

                    <span class="mr-3"><i class="icofont-ui-touch-phone"></i> +99890 951 54 99</span>


                    <!-- Topbar Language Dropdown Start -->
                    <div class="dropdown d-inline-flex lang-toggle shadow-sm">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hover="dropdown" data-animations="slideInUp slideInUp slideInUp slideInUp">
                            <img src="/images/us.svg" alt="" class="dropdown-item-icon">
                            <span class="d-inline-block d-lg-none">US</span>
                            <span class="d-none d-lg-inline-block"> <?=Yii::t('app','Languages')?></span> <i class="icofont-rounded-down"></i>
                        </a>
                        <div class="dropdown-menu dropdownhover-bottom dropdown-menu-right" role="menu">
                            <a class="dropdown-item active" href="/ru">Russian</a>
                            <a class="dropdown-item" href="/uz">O'zbekcha</a>
                            <a class="dropdown-item" href="/en">English&lrm;</a>
                        </div>
                    </div>
                    <!-- Topbar Language Dropdown End -->
                </div>
            </div>
        </div>
    </div>





    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container text-nowrap">
            <div class="d-flex align-items-center w-100 col p-0">
                <a class="navbar-brand rounded-bottom light-bg" style="margin: 0;"  href="<?=yii\helpers\Url::to(['site/index'])?>">
                    <img src="/images/logo.jpg" alt="">
                </a>
            </div>
            <!-- Topbar Request Quote Start -->
            <div class="d-inline-flex request-btn order-lg-last col p-0">

                <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Toggle Button End -->
            </div>
            <!-- Topbar Request Quote End -->

            <div class="collapse navbar-collapse" id="navbarCollapse" data-hover="dropdown" data-animations="slideInUp slideInUp slideInUp slideInUp">
                <ul class="navbar-nav ml-auto">

                <?php foreach ($menu as $key => $value) {
                    if ($value['type'] != Menu::TYPE_EMPTY) {
                        echo '<li class="nav-item"><a class="nav-link" href="' . $value['link'] . '">' . Language::getAttribute($value, 'title', $url) . '</a></li>';
                    } else {
                        if (isset($value['childs']) && $value['childs']) {
                            echo '<li class="nav-item dropdown">' . '<a href="' . $value['link'] . '">' . Language::getAttribute($value, 'title', $url) . ' <i class="icofont-rounded-down"></i></a>';
                            echo '<ul class="dropdown-menu">';
                            foreach ($value['childs'] as $key => $childValue) {
                                if (isset($childValue['childs']) && $childValue['childs']) {
                                    //echo '<li class="menu-item-has-children">' . '<a href="' . $childValue['link'] . '">' . Language::getAttribute($childValue, 'title', $url) . ' <i class="fa fa-angle-down"></i></a>';

                                    echo '<li class="dropdown-item">' . '<a href="' . $childValue['link'] . '">' . Language::getAttribute($childValue, 'title', $url) . ' <i class="icofont-rounded-down"></i></a>';

                                    echo '<ul class="dropdown-menu">';
                                    foreach ($childValue['childs'] as $key => $children) {
                                        if (isset($children['childs']) && $children['childs']) {
                                            echo '<li class="nav-item dropdown">' . '<a href="' . $childValue['link'] . '">' . Language::getAttribute($childValue, 'title', $url) . ' <i class="icofont-rounded-down"></i></a>';
                                            echo '<ul class="dropdown-menu">';
                                            foreach ($children['childs'] as $key => $children3) {
                                                echo '<li><a href="' . $children3['link'] . '">' . Language::getAttribute($children3, 'title', $url) . '</a></li>';
                                            }
                                            echo '</ul>';
                                            echo '</li>';
                                        } else {
                                            echo '<li><a href="' . $children['link'] . '">' . Language::getAttribute($children, 'title', $url) . '</a></li>';
                                        }
                                    }
                                    echo '</ul>';
                                    echo '</li>';
                                } else {
                                    echo '<li><a href="' . $childValue['link'] . '">' . Language::getAttribute($childValue, 'title', $url) . '</a></li>';
                                }
                            }
                            echo '</ul>';
                            echo '</li>';
                        } else {
                            echo '<li><a href="' . $value['link'] . '">' . Language::getAttribute($value, 'title', $url) . '</a></li>';
                        }
                    }
                }
                ?>

                    <button class="cart">
                        <a href="<?= yii\helpers\Url::to(['cart/index']) ?>">   <img src="/images/shopping-cart.svg" alt=""></a>
                        <span class="cart_count"><?=$count ? $count : 0?></span>
                    </button>
                </ul>
            </div>
        </div>
    </nav>
</header>

