<?php

namespace app\controllers;

use app\models\Pedidos;
use app\models\PedidosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PedidosController implements the CRUD actions for Pedidos model.
 */
class PedidosController extends Controller
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
     * Lists all Pedidos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PedidosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedidos model.
     * @param int $id_pedido Id Pedido
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pedido)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pedido),
        ]);
    }

    /**
     * Creates a new Pedidos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pedidos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pedido' => $model->id_pedido]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pedidos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pedido Id Pedido
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pedido)
    {
        $model = $this->findModel($id_pedido);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pedido' => $model->id_pedido]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pedidos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pedido Id Pedido
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pedido)
    {
        $this->findModel($id_pedido)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedidos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pedido Id Pedido
     * @return Pedidos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pedido)
    {
        if (($model = Pedidos::findOne(['id_pedido' => $id_pedido])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
