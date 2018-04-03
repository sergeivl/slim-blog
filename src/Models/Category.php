<?php namespace App\Models;

/**
 * Class Category
 * @package App\Models
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