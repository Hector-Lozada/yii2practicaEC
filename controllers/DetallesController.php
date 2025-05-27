<?php

namespace app\controllers;

use app\models\Detalles;
use app\models\DetallesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DetallesController implements the CRUD actions for Detalles model.
 */
class DetallesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                // Protege todas las acciones: solo usuarios autenticados pueden acceder
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
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
     * Lists all Detalles models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetallesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detalles model.
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
     * Creates a new Detalles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Detalles();

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
     * Updates an existing Detalles model.
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
     * Deletes an existing Detalles model.
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
     * Finds the Detalles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_detalle Id Detalle
     * @return Detalles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_detalle)
    {
        if (($model = Detalles::findOne(['id_detalle' => $id_detalle])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
