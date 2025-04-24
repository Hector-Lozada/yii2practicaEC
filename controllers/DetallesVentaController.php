<?php

namespace app\controllers;

use app\models\DetallesVenta;
use app\models\DetallesVentaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetallesVentaController implements the CRUD actions for DetallesVenta model.
 */
class DetallesVentaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all DetallesVenta models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetallesVentaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetallesVenta model.
     * @param int $iddetalles Iddetalles
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($iddetalles)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddetalles),
        ]);
    }

    /**
     * Creates a new DetallesVenta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DetallesVenta();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'iddetalles' => $model->iddetalles]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetallesVenta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $iddetalles Iddetalles
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($iddetalles)
    {
        $model = $this->findModel($iddetalles);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddetalles' => $model->iddetalles]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetallesVenta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $iddetalles Iddetalles
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($iddetalles)
    {
        $this->findModel($iddetalles)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetallesVenta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $iddetalles Iddetalles
     * @return DetallesVenta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddetalles)
    {
        if (($model = DetallesVenta::findOne(['iddetalles' => $iddetalles])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
