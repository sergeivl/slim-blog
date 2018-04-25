<?php


use Phinx\Seed\AbstractSeed;

class ClearDataSeeder extends AbstractSeed
{
    public function run()
    {
        $this->execute('SET foreign_key_checks = 0;');
        $this->table('page')->truncate();
        $this->table('post')->truncate();
        $this->table('category')->truncate();
        $this->table('tag')->truncate();
        $this->table('category_taxonomy')->truncate();
        $this->table('tag_taxonomy')->truncate();
        $this->execute('SET foreign_key_checks = 1;');
    }
}
