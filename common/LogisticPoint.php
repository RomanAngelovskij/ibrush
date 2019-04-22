<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class LogisticPoint
 * @package common\models
 *
 * @property integer $logistic_point_id
 * @property string $name
 * @property integer $foreign_id
 * @property string $foreign_model
 */
class LogisticPoint extends ActiveRecord
{

    public $primaryKey = 'logistic_point_id';

    public function getObjects()
    {
        /** @var ActiveRecord $model */
        $model = $this->_getForeignModel();

        return $this->hasMany(
            $model::className(),
            [$model->primaryKey => 'foreign_id']
        );
    }

    private function _getForeignModel()
    {
        $modelName = 'common\models\\' . ucfirst($this->foreign_model);

        return new $modelName;
    }
}