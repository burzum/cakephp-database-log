<?php

use Phinx\Migration\AbstractMigration;

class DatabaseLogTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->table('logs', ['id' => false, 'primary_key' => 'id'])
            ->addColumn('id', 'char', ['limit' => 36])
            ->addColumn('message', 'text', ['default' => null, 'null' => true])
            ->addColumn('level', 'text', ['default' => null, 'null' => true])
            ->addColumn('context', 'text', ['default' => null, 'null' => true])
            ->addColumn('created', 'datetime', ['default' => null, 'null' => true])
            ->addColumn('modified', 'datetime', ['default' => null, 'null' => true])
            ->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('logs')->drop();
    }
}