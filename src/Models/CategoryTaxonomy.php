<?php namespace App\Models;

/**
 * Class CategoryTaxonomy
 * @package App\Models
 * @property int $category_id
 * @property int $post_id
 */
class CategoryTaxonomy extends Model
{
    public $timestamps = false;
    public $table = 'category_taxonomy';
    protected $fillable = [
        'category_id',
        'post_id'
    ];
}