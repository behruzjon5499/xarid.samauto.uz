<?php

use abdualiym\slider\entities\Slides;
use backend\models\SiteLinks;
use yii\helpers\Url;
const GALLERY = 'gallery';

$galleries = Slides::getBySlug('gallery');
$sitelinks = SiteLinks::find()->all();
?>
<footer class="wide-tb-70 bg-sky-blue pb-0">
    <div class="container">
        <div class="row">

            <!-- Column First -->
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0" data-wow-delay="0s">
                <div class="logo-footer">
                    <img src="/images/logo.jpg" alt="">
                </div>
                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                <p>Vivamus ac ultrices diam, vitae accumsan tellus. Integer sollicitudin vulputate lacus, congue .</p>

                <h3 class="footer-heading"> <?=Yii::t('app','We are Social')?></h3>
                <div class="social-icons">
                    <?php foreach($sitelinks as $links):?>
                    <a href="<?=$links->url?>"><i class="icofont-<?=$links->link->icon?>"></i></a>
                <?php endforeach;?>
                </div>
            </div>
            <!-- Column First -->

            <!-- Column Second -->
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0" data-wow-delay="0.2s">
                <h3 class="footer-heading">Recent Post</h3>
                <div class="blog-list-footer">
                    <ul class="list-unstyled">
                        <li>
                            <div class="media">
                                <div class="post-thumb">
                                    <img src="/images/post_thumb_1.jpg" alt="" class="rounded-circle">
                                </div>
                                <div class="media-body post-text">
                                    <h5 class="mb-3 h5-md"><a href="#">Liberalisation of air cargo</a></h5>
                                    <p>Far far away, behind the word mountains, far from the countries.</p>

                                    <div class="comment-box">
                                        <span><i class="icofont-ui-calendar"></i>  04.10.2013</span>
                                        <span><a href="#"><i class="icofont-speech-comments"></i>  25</a></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="post-thumb">
                                    <img src="/images/post_thumb_2.jpg" alt="" class="rounded-circle">
                                </div>
                                <div class="media-body post-text">
                                    <h5 class="mb-3 h5-md"><a href="#">New Ocean Freight Rules</a></h5>
                                    <p>Far far away, behind the word mountains, far from the countries.</p>

                                    <div class="comment-box">
                                        <span><i class="icofont-ui-calendar"></i>  04.10.2013</span>
                                        <span><a href="#"><i class="icofont-speech-comments"></i>  25</a></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- Column Second -->
            <!-- Column Third -->
            <div class="col-lg-4 col-md-12 wow fadeInLeft" data-wow-duration="0" data-wow-delay="0.4s">
                <h3 class="footer-heading"><?=Yii::t('app','Our Gallery')?></h3>
                <ul id="basicuse" class="photo-thumbs">
               <?php foreach($galleries as $gallery):?>
                    <li>
                        <img src="<?=$gallery->getImageFileUrl('photo_0')?>" style="width: 100px; height: 80px;" alt="">
                    </li>
               <?php endforeach;?>
                </ul>
            </div>


        </div>
    </div>

    <div class="copyright-wrap bg-navy-blue wide-tb-30">
        <div class="container">
            <div class="row text-md-left text-center">
                <div class="col-sm-12 col-md-6 copyright-links">
                    <a href="#">Privacy Policy</a>   <span>|</span>   <a href="#">CONTACT</a>   <span>|</span>   <a href="#">FAQS</a>
                </div>
                <div class="col-sm-12 col-md-6 text-md-right text-center">
                    Designed by <a href="#" rel="nofollow">MannatStudio</a> © 2019 All Rights Reserved
                </div>
            </div>
        </div>
    </div>
</footer>
