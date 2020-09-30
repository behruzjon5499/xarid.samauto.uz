<?php

namespace frontend\widgets;

use yii\jui\Widget;

class ErrorWidget extends Widget
{
    public function run()
    {
        return $this->render('error_template');
    }
}
