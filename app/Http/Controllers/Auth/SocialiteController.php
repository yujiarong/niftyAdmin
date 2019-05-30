<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialiteService;

class SocialiteController extends Controller
{

    public function redirect($site){
        $this->validateSite($site);
        $socialiteService = new SocialiteService;
        $socialiteService->redirect($site);
    }

    public function callback($site){
        $this->validateSite($site);
        $socialiteService = new SocialiteService;
        $socialiteService->callback($site);
    }

    public function validateSite($site){
        if(!in_array($site,['facebook'])){
            abort(401,'no support');
        }       
    }

}
