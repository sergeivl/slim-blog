<?php namespace App\Models;

/**
 * Class TagTaxonomy
 * @package App\Models
 * @property integer $tag_id
 * @property integer $post_id
 */
class TagTaxonomy extends Model
{
    public $timestamps = false;
    public $table = 'tag_taxonomy';
    protected $fillable = [
        'tag_id',
        'post_id'
    ];
}