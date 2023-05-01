<?php

use Phinx\Migration\AbstractMigration;

class InitDb extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('role', 'string', ['default' => 'user'])
            ->create();
    }
}
