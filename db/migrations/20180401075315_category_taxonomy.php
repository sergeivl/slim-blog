<?php


use Phinx\Migration\AbstractMigration;

class CategoryTaxonomy extends AbstractMigration
{
    public function change()
    {
        $this->table('category_taxonomy')
            ->addColumn('post_id', 'integer', ['null' => false])
            ->addColumn('category_id', 'integer', ['null' => false])
            ->addIndex(['post_id', 'category_id'], ['unique' => true])
            ->addForeignKey(['post_id'], 'post', ['id'], ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->addForeignKey(['category_id'], 'category', ['id'], ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->save();
    }
}
