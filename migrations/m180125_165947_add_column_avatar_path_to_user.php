<?php

use yii\db\Migration;

class m180125_165947_add_column_avatar_path_to_user extends Migration
{
    public $tableUser = 'user';

    public function safeUp()
    {
        $this->addColumn($this->tableUser, 'avatar_path', $this->string(255));
    }

    public function safeDown()
    {
        $this->dropColumn($this->tableUser, 'avatar_path');
    }
}
