<?php

namespace frontend\widgets;

use yii\jui\Widget;

class FooterWidget extends Widget
{
    public function run()
    {
        return $this->render('footer_template');
    }
}
