<?php

use yii\db\Migration;

class m180125_164142_add_column_is_admin_to_user extends Migration
{
    public $tableUser = 'user';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn($this->tableUser, 'is_admin', $this->boolean()->notNull()->defaultValue(false));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableUser, 'is_admin');
    }
}
