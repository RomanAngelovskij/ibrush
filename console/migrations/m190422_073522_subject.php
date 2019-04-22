<?php

use yii\db\Migration;

/**
 * Class m190422_073522_subject
 */
class m190422_073522_subject extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->db->driverName === 'mysql'
            ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
            : null;

        $this->createTable('{{%subject%}}', [
            'subject_id' => $this->bigInteger(20)->unsigned()->notNull()->unique() . ' AUTO_INCREMENT',
            'name' => $this->text()->notNull(),
            'parent_id' => $this->bigInteger(20)->unsigned()->defaultValue(null),
            'level' => $this->tinyInteger(4)->unsigned()->defaultValue(null)
        ], $tableOptions);

        $this->addPrimaryKey('subject_id__pk', '{{%subject%}}', 'subject_id');

        $this->addForeignKey('FK_163', '{{%logistic_point%}}', 'subject_id', '{{%subject%}}', 'subject_id');
        $this->addForeignKey('subject_ibfk_1', '{{%subject%}}', 'parent_id', '{{%subject%}}', 'subject_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_163', '{{%logistic_point%}}');
        $this->dropForeignKey('subject_ibfk_1', '{{%subject%}}');

        $this->dropTable('{{%subject%}}');
    }
}
