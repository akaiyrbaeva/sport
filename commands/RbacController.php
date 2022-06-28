<?php

namespace app\commands;

use app\rbac\AdminRule;
use app\rbac\RoleEnum;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $adminRule = new AdminRule();
        $auth->add($adminRule);

        $admin = $auth->createRole(RoleEnum::ADMIN);
        $admin->ruleName = $adminRule->name;
        $auth->add($admin);
    }
}
