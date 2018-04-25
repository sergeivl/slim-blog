<?php


use Phinx\Migration\AbstractMigration;

class TagTaxonomy extends AbstractMigration
{
    public function change()
    {
        $this->table('tag_taxonomy')
            ->addColumn('post_id', 'integer', ['null' => false])
            ->addColumn('tag_id', 'integer', ['null' => false])
            ->addIndex(['post_id', 'tag_id'], ['unique' => true])
            ->addForeignKey(['post_id'], 'post')
            ->addForeignKey(['tag_id'], 'category')
            ->save();
    }
}
