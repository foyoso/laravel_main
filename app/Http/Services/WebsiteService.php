<?php
namespace App\Http\Services;
use App\Models\Website;
use App\Models\WebsiteSetting;
use App\Utils\CommonFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class WebsiteService
{
    public function findByDomain($domain)
    {
        $website = new Website();
        $result = $website -> findByDomain($domain);
        return $result;
    }
}