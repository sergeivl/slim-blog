<?php


use Phinx\Migration\AbstractMigration;

class TagTaxonomy extends AbstractMigration
{
    public function change()
    {
        $this->table('tag_taxonomy')
            ->addColumn('post_id', 'integer', ['null' => false])
            ->addColumn('category_id', ['null' => false])
            ->addForeignKey(['tag_id'], 'tag')
            ->addIndex(['post_id', 'tag_id'], ['unique' => true]);
    }
}
