<?php

use yii\db\Migration;

/**
 * Class m190422_073510_logistic_point
 */
class m190422_073510_logistic_point extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->db->driverName === 'mysql'
            ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
            : null;

        $this->createTable('{{%logistic_point%}}', [
            'logistic_point_id' => $this->bigInteger(20)->unsigned()->notNull() . ' AUTO_INCREMENT PRIMARY KEY',
            'name' => $this->string(255)->defaultValue(null),
            'subject_id' => $this->bigInteger(20)->unsigned()->defaultValue(null)
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%logistic_point%}}');
    }
}
