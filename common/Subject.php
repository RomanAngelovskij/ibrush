<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Subject
 * @package common\models
 *
 * @property integer $subject_id
 * @property string $name
 * @property integer $parent_id
 * @property integer $level
 */
class Subject extends ActiveRecord
{

    public $primaryKey = 'subject_id';

    public function getLogisticPoints()
    {
        return $this->hasMany(LogisticPoint::class, ['foreign_id' => 'subject_id'])
            ->where(['foreign_model' => 'subject']);
    }
}