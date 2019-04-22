<?php

use yii\db\Migration;

/**
 * Class m190422_082239_logistic_point__foreign_id
 */
class m190422_082239_logistic_point__foreign_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('FK_163', '{{%logistic_point%}}');

        $this->renameColumn('{{%logistic_point%}}', 'subject_id', 'foreign_id');
        $this->addColumn('{{%logistic_point%}}', 'foreign_model', "ENUM('subject', 'facility') DEFAULT 'subject'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('{{%logistic_point%}}', 'subject_id', 'foreign_id');
        $this->dropColumn('{{%logistic_point%}}', 'foreign_model');

        $this->dropForeignKey('FK_163', '{{%logistic_point%}}');
    }
}
