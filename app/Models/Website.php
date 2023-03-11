<?php

namespace App\Models;

use App\Models\ModelBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Website extends ModelBase
{
    use  HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'menu',
        'domain',
        'protocol',
        'google_site_verification',
        'google_analytic',
        'remarketing_tag',
        'favicon',
        'logo',
        'footer_text',
        'email',
        'phone',
        'user_id',
        'layout_id',
        'start_date',
        'end_date',
        'custom_css',
        'custom_js',
    ];

    public function layout()
    {
        return $this->belongsTo(Layout::class,'layout_id');
    }

    public function findByDomain($domain)
    {
        $web = Website::where('domain', $domain)->first();
        return $web;
    }
}