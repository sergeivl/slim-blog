<?php namespace App\Models;

/**
 * Class CategoryTaxonomy
 * @package App\Models
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