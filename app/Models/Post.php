<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends ModelBase
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
        'user_id',
        'website_id',
        'content',
        'description',
        'key_word',
        'thumbnail',
        'tags',
        'publish_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getTags(){
        if($this -> tags !=''){
            $tagId = substr($this -> tags, 1, -1);
            return Tag::select('id','name', 'slug') -> whereIn('id', explode(',', $tagId)) -> orderbyDesc('updated_at')->get();
        }
        return [];
    }

}