<?php namespace App\Models;
/**
 * Class Category
 * @package App\Models
 */
class Page extends Model
{
    public $table = 'page';
    protected $fillable = [
        'title',
        'title_seo',
        'meta_d',
        'meta_k',
        'preview_text',
        'text',
        'alias',
        'status',
        'robots_index',
        'robots_follow',
        'is_active'
    ];
}