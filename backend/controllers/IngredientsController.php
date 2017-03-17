<?php

namespace backend\controllers;

use Yii;

use yii\helpers\Url;

use yii\web\NotFoundHttpException;

use backend\models\Recipes;
use backend\models\RecipesData;
use backend\models\Ingredients;
use backend\models\IngredientsSearch;

/**
 * IngredientsController implements the CRUD actions for Ingredients model.
 */
class IngredientsController extends \common\baseComponents\BaseController
{
    /**
     * Lists all Ingredients models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();

        $searchModel = new IngredientsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Установить статус активности для ингредиента.
     * Также увеличивает счетчик активности рецепта.
     */
    public function actionSetActiveStatus($id)
    {
        $model = $this->findModel($id);
        $model->scenario = $model::SCENARIO_SET_STATUS;

        if ($model->setActiveStatus() && $model->save()) {
            // Увеличиваем статус рецепта
            Recipes::increaseStatus($model->recipesIds);

            Yii::$app->session->setFlash('success', 'Ингредиент ' . $model->name . ' снова виден!');
        } else {
            Yii::$app->session->setFlash('error', 'Что то пошло не так (');
        }

        return $this->redirect([Url::previous()]);
    }

    /**
     * Установить статус скрытности для ингредиента.
     * Также уменьшает счетчик активности рецепта.
     */
    public function actionSetHiddenStatus($id)
    {
        $model = $this->findModel($id);
        $model->scenario = $model::SCENARIO_SET_STATUS;

        if ($model->setHiddenStatus() && $model->save()) {
            // Уменьшаем статус рецепта
            Recipes::reduceStatus($model->recipesIds);

            Yii::$app->session->setFlash('success', 'Ингредиент ' . $model->name . ' успешно скрыт.');
        } else {
            Yii::$app->session->setFlash('error', 'Что то пошло не так (');
        }
        return $this->redirect([Url::previous()]);
    }

    /**
     * Displays a single Ingredients model.
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
     * Creates a new Ingredients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ingredients();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Ингредиент "' . $model->name . '", был добавлен.');
            return $this->redirect([Url::previous()]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ingredients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ingredients model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->status == $model::STATUS_HIDDEN) {
            // Увеличиваем статус рецептов
            Recipes::increaseStatus($model->recipesIds);
        }
        // Очищаем все упоминания ингридиента.
        // Удалять рецепты с данным ингридиентом не буду.
        // т.к. в них можно добавить другой ингридиент.
        RecipesData::deleteIngredient($model->id);
        // Удаляем сам ингридиент
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ingredients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ingredients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ingredients::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
