<?php namespace App\Models;

/**
 * Class TagTaxonomy
 * @package App\Models
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