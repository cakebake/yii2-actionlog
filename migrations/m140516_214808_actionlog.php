<?php

use yii\db\Schema;

/**
* DATABSE SCHEMA OF THIS MODULE
*
* @version 1.0.0
* @see http://www.yiiframework.com/doc-2.0/guide-console-migrate.html
*/
class m140516_214808_actionlog extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%actionlog}}', [
            'id' => Schema::TYPE_BIGPK,
            'user_id' => Schema::TYPE_BIGINT . ' NOT NULL DEFAULT 0',
            'user_remote' => Schema::TYPE_STRING . ' NOT NULL',
            'time' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'action' => Schema::TYPE_STRING . ' NOT NULL',
            'category' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_STRING . ' NULL',
            'message' => Schema::TYPE_TEXT . ' NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%actionlog}}');
    }
}
