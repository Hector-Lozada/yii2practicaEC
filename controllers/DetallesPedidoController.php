<?php

namespace app\controllers;

use app\models\DetallesPedido;
use app\models\DetallesPedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetallesPedidoController implements the CRUD actions for DetallesPedido model.
 */
class DetallesPedidoController extends Controller
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
     * Lists all DetallesPedido models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetallesPedidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetallesPedido model.
     * @param int $id_detalle Id Detalle
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_detalle)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_detalle),
        ]);
    }

    /**
     * Creates a new DetallesPedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DetallesPedido();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_detalle' => $model->id_detalle]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetallesPedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_detalle Id Detalle
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_detalle)
    {
        $model = $this->findModel($id_detalle);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_detalle' => $model->id_detalle]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetallesPedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_detalle Id Detalle
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_detalle)
    {
        $this->findModel($id_detalle)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetallesPedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_detalle Id Detalle
     * @return DetallesPedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_detalle)
    {
        if (($model = DetallesPedido::findOne(['id_detalle' => $id_detalle])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
