<?php namespace App\Models;
/**
 * Class Category
 * @package App\Models
 */
class User extends Model
{
    public $table = 'user';
    public $timestamps = false;

    protected $fillable = [
        'emil',
        'name',
        'password_hash',
        'role'
    ];
}
