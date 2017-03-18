<?php

namespace backend\controllers;

use Yii;

use yii\helpers\Url;

use yii\web\NotFoundHttpException;

use backend\models\Recipes;
use backend\models\RecipesData;
use backend\models\Ingredients;
use backend\models\RecipesSearch;

/**
 * RecipesController implements the CRUD actions for Recipes model.
 */
class RecipesController extends \common\baseComponents\BaseController
{
    /**
     * Lists all Recipes models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();
        $searchModel = new RecipesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recipes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Recipes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recipes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Рецепт "' . $model->name . '", был добавлен.');
            return $this->redirect(Url::toRoute(['/recipes/update', 'id' => $model->id]));
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Recipes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        Url::remember();

        $model = $this->findModel($id);
        $modelData = new RecipesData;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelData' => $modelData,
                'ingredients' => Ingredients::getDropDownListItems(),
            ]);
        }
    }

    /**
     * Deletes an existing Recipes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // Очищаем все упоминания рецепта
        RecipesData::deleteRecipe($model->id);
        // Удаляем сам рецепт
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recipes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recipes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
