<?php

use Phinx\Migration\AbstractMigration;

class InitialMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

     public function change()
     {
       $usersTable = $this->table('users');
       $usersTable
         ->addColumn('username', 'string', ['length' => 50])
         ->addColumn('password', 'string', ['length' => 150])
         ->addColumn('email', 'string', ['length' => 50])
         ->addColumn('role', 'string', ['length' => 20])
         ->addColumn('created', 'datetime')
         ->addColumn('modified', 'datetime')
         ->create();
     }

    public function up()
    {

    }

    public function down()
    {
      $this->dropTable('users');
    }

}
