<?php

namespace backend\controllers;

use Yii;

use yii\helpers\Url;

use backend\models\Ingredients;
use backend\models\RecipesData;

/**
 * RecipesDataController implements the CRUD actions for RecipesData model.
 */
class RecipesDataController extends \common\baseComponents\BaseController
{
    /**
     * Creates a new RecipesData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RecipesData();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Ингредиент успешно добавлен в рецепт');
        } else {
            Yii::$app->session->setFlash('error', 'Что то пошло не так (');
        }
        return $this->redirect([Url::previous()]);
    }

    /**
     * Updates an existing RecipesData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([Url::previous()]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ingredients' => Ingredients::getDropDownListItems(),
            ]);
        }
    }

    /**
     * Deletes an existing RecipesData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect([Url::previous()]);
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
        if (($model = RecipesData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
