<div class="site-error">

    <div class="main-content">
        <div id="rs-page-error" class="rs-page-error">
            <div class="error-text">
                <h1 class="error-code">404</h1>
                <h3 class="error-message">Page Not Found</h3>
                <form>
                    <input type="search" placeholder="Search..." name="s" class="search-input" value="">
                    <button type="submit" value="Search"><i class="fa fa-search"></i></button>
                </form>
                <a class="back-home" href="<?= \yii\helpers\Url::to(['../site/index']) ?>" title="HOME">Back to Homepage</a>
                <p>
                    The above error occurred while the Web server was processing your request.
                </p>
                <p>
                    Please contact us if you think this is a server error. Thank you.
                </p>
            </div>
        </div>
    </div>
    <!--    <div class="alert alert-danger">-->
    <!--        --><? //= nl2br(Html::encode($message)) ?>
    <!--    </div>-->
</div>
