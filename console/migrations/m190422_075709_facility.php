<?php

use yii\db\Migration;

/**
 * Class m190422_075709_facility
 */
class m190422_075709_facility extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->db->driverName === 'mysql'
            ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
            : null;

        $this->createTable('{{%facility%}}', [
            'facility_id' => $this->bigInteger(20)->unsigned()->notNull()->unique() . ' AUTO_INCREMENT',
            'name' => $this->text()->notNull(),
            'active' => $this->boolean()->defaultValue(true),
        ], $tableOptions);

        $this->addPrimaryKey('facility_id__pk', '{{%facility%}}', 'facility_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%facility%}}');
    }
}
