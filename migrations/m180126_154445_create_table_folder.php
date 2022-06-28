<?php

use yii\db\Migration;

class m180126_154445_create_table_folder extends Migration
{
    public $tableFolder = 'folder';
    public $tableUser = 'user';

    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableFolder, [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'name' => $this->string(255)->notNull(),
            'owner_id' => $this->integer()->notNull(),
            'parent_id' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey("{$this->tableFolder}_parent_id_fkey",
            $this->tableFolder,
            'parent_id',
            $this->tableFolder,
            'id');

        $this->addForeignKey("{$this->tableFolder}_created_by_fkey",
            $this->tableFolder,
            'created_by',
            $this->tableUser,
            'id');

        $this->addForeignKey("{$this->tableFolder}_updated_by_fkey",
            $this->tableFolder,
            'updated_by',
            $this->tableUser,
            'id');

        $this->addForeignKey("{$this->tableFolder}_owner_id_fkey",
            $this->tableFolder,
            'owner_id',
            $this->tableUser,
            'id');
    }

    public function safeDown()
    {
        $this->dropTable($this->tableFolder);
    }
}
