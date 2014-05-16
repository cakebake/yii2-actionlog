<?php

namespace cakebake\actionlog\controllers;

use Yii;
use cakebake\actionlog\model\ActionLog;
use cakebake\actionlog\model\ActionLogSearch;
use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * LogController implements the CRUD actions for ActionLog model.
 */
class LogController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all ActionLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActionLogSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single ActionLog model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
