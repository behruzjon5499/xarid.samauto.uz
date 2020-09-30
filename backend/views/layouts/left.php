<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Adminstrator</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Categories', 'icon' => 'file-code-o', 'url' => ['/categories'],],
                    ['label' => 'Cart', 'icon' => 'file-code-o', 'url' => ['/cart'],],
                    ['label' => 'Question and Answer', 'icon' => 'file-code-o', 'url' => ['/question-answer'],],
                    ['label' => 'Orders', 'icon' => 'file-code-o', 'url' => ['/orders'],],
                    ['label' => 'Members', 'icon' => 'file-code-o', 'url' => ['/slider/slides/index?slug=members'],],
                    ['label' => 'Partner', 'icon' => 'file-code-o', 'url' => ['/slider/slides/index?slug=partner'],],
                    ['label' => 'Cortumers Say', 'icon' => 'file-code-o', 'url' => ['/slider/slides/index?slug=costumers'],],
                    [
                        'label' => 'Feedback',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Feedback', 'icon' => 'envelope-o', 'url' => ['/feedback']],
                            ['label' => 'Product feedback', 'icon' => 'file-code-o', 'url' => ['/product-feedback'],],

                        ],
                    ],
                    [
                        'label' => 'Links',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Links', 'icon' => 'dashboard', 'url' => ['/links'],],
                            ['label' => 'Site and links', 'icon' => 'file-code-o', 'url' => ['/site-and-links'],],

                        ],
                    ],
                    [
                        'label' => 'Products',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Products', 'icon' => 'file-code-o', 'url' => ['/products'],],
                            ['label' => 'Product_photos', 'icon' => 'dashboard', 'url' => ['/product-photos'],],

                        ],
                    ],
                    [
                        'label' => 'Site',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Menu', 'icon' => 'th-list', 'url' => ['/cms/menu']],
                            ['label' => 'Pages', 'icon' => 'font', 'url' => ['/cms/pages']],
                        ],
                    ],


                    ['label' => 'Login', 'url' => ['/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
