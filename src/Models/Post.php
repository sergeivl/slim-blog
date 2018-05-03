<?php namespace App\Models;
/**
 * Class Category
 * @package App\Models
 * @property Category[] $category_taxonomy
 * @property Tag[] $tag_taxonomy
 * @property string $title
 * @property string $title_seo
 * @property string $meta_d
 * @property string $meta_k
 * @property string $text
 * @property string $preview_text
 * @property string $alias
 * @property int $status
 * @property int $robots_index
 * @property int $robots_follow
 * @property int $is_active
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