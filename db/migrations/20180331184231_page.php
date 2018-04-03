<?php


use Phinx\Migration\AbstractMigration;

class Page extends AbstractMigration
{
    public function change()
    {
        $this->table('page')
            ->addColumn('title', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('title_seo', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('meta_d', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('meta_k', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('text', 'text', ['null' => true])
            ->addColumn('alias', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'null' => false])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->addColumn('robots_index','integer', ['limit' => 1, 'null' => false, 'default' => 1])
            ->addColumn('robots_follow','integer', ['limit' => 1, 'null' => false, 'default' => 1])
            ->addColumn('is_active','integer', ['limit' => 1, 'null' => false, 'default' => 1])
            ->addIndex(['created_at', 'updated_at'])
            ->addIndex(['alias'], ['unique' => true])
            ->save();
    }
}
