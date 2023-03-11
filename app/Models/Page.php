<?php

namespace App\Models;

use App\Models\ModelBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends ModelBase
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'title',
        'banner_title',
        'description',
        'banner_description',
        'keyword',
        'slug',
        'og_image',
        'page_default',
        'html_content',
        'status',
        'review',
        'rating',
        'is_home_page',
        'website_id',
        'banner_type',
        'image_slider',
        'image_banner',
    ];







}