<?php namespace App\Models;
/**
 * Class Page
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
        //'status', TODO: потом добавить в БД
        'robots_index',
        'robots_follow',
        'is_active'
    ];
}