<?php

namespace backend\controllers;

use Yii;
use backend\models\SiteConfig;
use backend\models\SiteConfigSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SiteConfigController implements the CRUD actions for SiteConfig model.
 */
class SiteConfigController extends BasicController
{

    /**
     * Updates an existing SiteConfig model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if(!empty($model->logo)) {
                $model->logo = UploadedFile::getInstance($model, 'logo');
                if($model->logo ) {
                    $fileName = 'logo.png';
                    $model->logo->saveAs(Yii::getAlias('@logo').'/'.$fileName);
                    $model->logo = $fileName;
                }
            } else {
                $model->logo = 'logo.png';
            }
            if($model->save()) {
                $this->success();
            }
            return $this->redirect(['update', 'id' => $id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Finds the SiteConfig model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SiteConfig the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteConfig::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
