<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Facility
 * @package common\models
 *
 * @property integer $facility_id
 * @property string $name
 * @property boolean $active
 */
class Facility extends ActiveRecord
{

    public $primaryKey = 'facility_id';

    public function getLogisticPoints()
    {
        return $this->hasMany(LogisticPoint::class, ['foreign_id' => 'facility_id'])
            ->where(['foreign_model' => 'facility']);
    }
}