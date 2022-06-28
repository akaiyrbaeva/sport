<?php

namespace app\controllers;

use app\models\History;
use app\models\search\HistorySearch;
use app\rbac\RoleEnum;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class HistoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [RoleEnum::ADMIN],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new HistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionClear()
    {
        History::deleteAll();

        Yii::$app->session->setFlash('success', '«Тарих» кестесінің деректері толығымен өшірілді!');

        return $this->redirect(['index']);
    }
}
