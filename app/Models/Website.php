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
        'facebook_pixel_code',
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
        'facebook',
        'youtube',
        'instagram',
        'linkedin',
        'zalo',
        'website_type_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function layout()
    {
        return $this->belongsTo(Layout::class,'layout_id');
    }
    public function webType()
    {
        return $this->belongsTo(WebsiteType::class,'website_type_id');
    }

    public function findByDomain($domain)
    {
        $web = Website::where('domain', $domain)->first();
        return $web;
    }
    public function getDomain($withProtocol = 0){

        if ($withProtocol > 0) {
            return $this -> protocol . '://'.$this -> domain;
        }
        return $this -> domain;
    }
    public function getStatus(){
        $startDate = strtotime($this -> start_date);
        $endDate = strtotime($this -> end_date);
        $today = strtotime(date("Y-m-d"));
        $endDateSoon = strtotime(date('Y-m-d', strtotime("-30 day", $endDate)));

        if($today < $startDate){
            return 'Not use';
        } else if($startDate<=$today && $today <=  $endDateSoon) {
            return 'Is used';
        } else if ($today > $endDateSoon && $today <= $endDate){
            return 'Expired soon';
        }
        return 'Expired';
    }
    public function getLabelStatus(){
        $status = $this -> getStatus();
        if($status == 'Not use'){
            return '<span class="badge bg-warning">'.$status.'</span>';
        } else if($status == 'Is used'){
            return '<span class="badge bg-success">'.$status.'</span>';

        } else if($status == 'Expired soon'){
            return '<span class="badge bg-danger">'.$status.'</span>';
        }
        return '<span class="badge bg-dark">'.$status.'</span>';
    }

}