<?php


use Phinx\Migration\AbstractMigration;

class User extends AbstractMigration
{
    public function change()
    {
        $this->table('user')
            ->addColumn('email', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('name', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('password_hash', 'string', ['null' => false])
            ->addColumn('role', 'integer', ['default' => 0, 'null' => true])
            ->addColumn('is_active','integer', ['limit' => 1, 'null' => false, 'default' => 0])
            ->addIndex(['email'], ['unique' => true])
            ->save();
    }
}
