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
        // get domain
        $this ->domain = parse_url(request()->root())['host'];
        // get website
        $websiteService  = new WebsiteService();
        $this -> website = $websiteService -> findByDomain($this ->domain);
        // get directory 
        $directory = $this->website->layout['directory'] ?? 'default ???';
        $this -> layoutDir = 'client.'.$directory;

        view()->share('directory', $directory );
        view()->share('viewDir', $this -> layoutDir );
        view()->share('website', $this -> website );
    }
}