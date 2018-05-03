<?php namespace App\Models;

/**
 * Class User
 * @property string $title
 * @property string $title_seo
 * @property string $meta_d
 * @property string $alias
 * @property string $text
 * @property string $status
 * @package App\Models
 */
class Tag extends Model
{
    protected $table = 'tag';
    protected $fillable = [
        'title',
        'title_seo',
        'meta_d',
        'text',
        'alias',
        'is_active',
        'post_count',
        'sort'
    ];
    public function TagTaxonomy()
    {
        return $this->hasMany('App\Models\TagTaxonomy', 'tag_id', 'id');
    }
}