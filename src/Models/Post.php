<?php namespace App\Models;
/**
 * Class Category
 * @package App\Models
 * @property mixed $category_taxonomy
 * @property mixed $tag_taxonomy
 */
class Post extends Model
{
    public $table = 'post';
    protected $fillable = [
        'title',
        'title_seo',
        'meta_d',
        'meta_k',
        'text',
        'alias',
        'status',
        'robots_index',
        'robots_follow',
        'is_active'
    ];

    public function categoryTaxonomy()
    {
        return $this->hasMany('App\Models\CategoryTaxonomy', 'post_id', 'id');
    }

    public function TagTaxonomy()
    {
        return $this->hasMany('App\Models\TagTaxonomy', 'post_id', 'id');
    }
}