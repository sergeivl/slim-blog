<?php namespace App\Models;

/**
 * Class Category
 * @package App\Models
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

class Category extends Model
{
    public $table = 'category';
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
        'post_count',
        'sort'
    ];
}