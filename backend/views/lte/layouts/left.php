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
//                    ['label' => 'Categories', 'icon' => 'file-code-o', 'url' => ['/categories'],],
                    ['label' => 'Companies', 'icon' => 'file-code-o', 'url' => ['/companies'],],
                    ['label' => 'Feedback', 'icon' => 'file-code-o', 'url' => ['/feedback'],],
                    ['label' => 'Document', 'icon' => 'file-code-o', 'url' => ['/document'],],
                    ['label' => 'Question and Answer', 'icon' => 'file-code-o', 'url' => ['/question-answer'],],
                    ['label' => 'Contacts', 'icon' => 'file-code-o', 'url' => ['/contacts'],],
                    ['label' => 'Auctions', 'icon' => 'file-code-o', 'url' => ['/auctions'],],
                    ['label' => 'Site Contacts', 'icon' => 'file-code-o', 'url' => ['/site-contacts'],],
                    ['label' => 'Login', 'url' => ['/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
