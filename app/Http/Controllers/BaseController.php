<?php

namespace App\Http\Controllers;

use App\Http\Services\WebsiteService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $domain;
    public $website;
    public $layoutDir;
    public function __construct()
    {

        $this ->domain = parse_url(request()->root())['host'];
        $websiteService  = new WebsiteService();
        $this -> website = $websiteService -> findByDomain($this ->domain);
        $this -> layoutDir = 'client.guesthouse';
        view()->share('viewDir', $this -> layoutDir );
        view()->share('website', $this -> website );
    }
}