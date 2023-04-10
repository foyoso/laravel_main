<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends ModelBase
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name',
        'slug',
        'longitude',
        'latitude',
        'thumbnail',
        'images',
        'address',
        'commune',
        'district',
        'province',
        'price',
        'description',
        'sale_or_rent',
        'bedroom',
        'bathroom',
        'area',
        'user_id',
        'website_id',
        'tags'
    ];






}