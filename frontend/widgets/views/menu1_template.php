<?php

use abdualiym\cms\entities\Menu;
use abdualiym\language\Language;

/**
 *
 * @var $menu Menu
 */
$url = Yii::$app->language;
?>


<header class="fixed-top header-fullpage bordered-nav wow fadeInDown">
    <div class="top-bar-right d-flex align-items-center text-md-left">
        <div class="container px-0">
            <div class="row align-items-center">
                <div class="col d-flex">
                    <div class="top-text">
                        <small class="txt-sky-blue">Address</small>
                        Toshkent Shaxar Mirzo Ulugbek ziyolilar ko'chasi
                    </div>
                    <div class="top-text">
                        <small class="txt-sky-blue">Emaii Us</small>
                        <a href="#">jalyuzilar.uz@@gmail.com</a>
                    </div>
                    <div class="top-text">
                        <small class="txt-sky-blue">Phone Number</small>
                        +99890 951 54 99
                    </div>
                </div>
                <div class="col-md-auto">

                    <!-- Topbar Language Dropdown Start -->
                    <div class="dropdown d-inline-flex lang-toggle shadow-sm">
                        <a href="#" class="dropdown-toggle btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hover="dropdown" data-animations="slideInUp slideInUp slideInUp slideInUp">
                            <img src="images/us.svg" alt="" class="dropdown-item-icon">
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

    <!-- Main Navigation Start -->
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container text-nowrap bdr-nav px-0">
            <div class="d-flex mr-auto">
                <a class="navbar-brand rounded-bottom light-bg" style="margin: 0;" href="<?=yii\helpers\Url::to(['site/index'])?>">
                    <img src="/images/logo.jpg" alt="">
                </a>
            </div>
            <!-- Toggle Button Start -->
            <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

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

                </ul>
            </div>
        </div>
    </nav>
</header>

