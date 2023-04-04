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

        view()->share('meta_description', '' );
        view()->share('meta_url', $this -> website -> getDomain('1') );
        view()->share('meta_image',  $this -> website ->logo);
        view()->share('meta_keyword', '');
        view()->share('meta_title', $this -> website ->name );
        view()->share('title', $this -> website ->name );
    }
    public function setMetaTag($meta_description, $meta_url, $meta_image, $meta_keyword, $title ){
        view()->share('meta_description', $meta_description);
        view()->share('meta_url', $meta_url);
        view()->share('meta_image',  $meta_image);
        view()->share('meta_keyword', $meta_keyword);
        view()->share('meta_title', $title );
        view()->share('title', $title );
    }
}