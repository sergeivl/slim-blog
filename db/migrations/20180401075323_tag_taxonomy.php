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
            ->addForeignKey(['post_id'], 'post', ['id'], ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->addForeignKey(['tag_id'], 'tag', ['id'], ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->save();
    }
}
