<?php

namespace app\rbac;

use Yii;
use yii\rbac\Rule;

class AdminRule extends Rule
{
    public $name = 'admin';

    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
            return Yii::$app->user->identity->is_admin;
        }

        return false;
    }
}
