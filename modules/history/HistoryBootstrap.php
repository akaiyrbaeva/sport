<?php

namespace app\modules\history;

use app\models\History;
use app\models\User;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\web\Application;
use yii\web\User as UserComponent;
use yii\web\UserEvent;

class HistoryBootstrap implements BootstrapInterface
{
    /**
     * @param Application $app
     */
    public function bootstrap($app)
    {
        $this->registerEvents($app);
    }

    public function registerEvents(Application $app)
    {
        // Login
        Event::on(UserComponent::className(), UserComponent::EVENT_AFTER_LOGIN, function (UserEvent $event) {
            $historyModel = new History();

            $historyModel->user_id = $event->identity->getId();
            $historyModel->action = 'login';
            $historyModel->comment = Yii::$app->request->userIP;

            if (!$historyModel->save()) {
                Yii::error($historyModel->getErrors());
            }
        });

        // Logout
        Event::on(UserComponent::className(), UserComponent::EVENT_AFTER_LOGOUT, function (UserEvent $event) {
            $historyModel = new History();

            $historyModel->user_id = $event->identity->getId();
            $historyModel->action = 'logout';
            $historyModel->comment = Yii::$app->request->userIP;

            if (!$historyModel->save()) {
                Yii::error($historyModel->getErrors());
            }
        });

        // User create
        Event::on(User::className(), User::EVENT_AFTER_INSERT, function (Event $event) {
            $historyModel = new History();

            $historyModel->user_id = Yii::$app->user->getId();
            $historyModel->action = 'user_create';
            $historyModel->comment = Yii::$app->request->userIP;

            if (!$historyModel->save()) {
                Yii::error($historyModel->getErrors());
            }
        });

        // User update
        Event::on(User::className(), User::EVENT_AFTER_UPDATE, function (Event $event) {
            $historyModel = new History();

            $historyModel->user_id = Yii::$app->user->getId();
            $historyModel->action = 'user_update';

            if (!$historyModel->save()) {
                Yii::error($historyModel->getErrors());
            }
        });

        // User delete
        Event::on(User::className(), User::EVENT_AFTER_DELETE, function (Event $event) {
            $historyModel = new History();

            $historyModel->user_id = Yii::$app->user->getId();
            $historyModel->action = 'user_delete';

            if (!$historyModel->save()) {
                Yii::error($historyModel->getErrors());
            }
        });



    }
}
