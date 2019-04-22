<?php
namespace frontend\controllers;

use common\models\LogisticPoint;
use yii\rest\ActiveController;

class LogisticPointController extends ActiveController
{
    public $modelClass = LogisticPoint::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['view']);
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['options']);
        return $actions;
    }

    public function actionIndex()
    {
        $result = [];
        $query = \Yii::$app->request->post('q');
        $logisticPoints = LogisticPoint::find()->where(['LIKE', 'name', $query])->all();

        if (!empty($logisticPoints)) {
            /** @var LogisticPoint $logisticPoint */
            foreach ($logisticPoints as $logisticPoint) {
                $result[] = [
                    'logistic_point_id' => $logisticPoint->logistic_point_id,
                    'name' => $logisticPoint->name,
                    'objects_type' => empty($logisticPoint->foreign_id) ? null : $logisticPoint->foreign_model,
                    'objects' => $logisticPoint->objects,
                ];
            }
        }

        return $result;
    }
}