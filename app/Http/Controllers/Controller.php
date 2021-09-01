<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	public $data;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   public function __construct()
    {
    	$this->data['main_menu'] = 'Users';
    	$this->data['sub_menu']  = 'Users';

    	$this->data['tab_menu']  = '';

    }
     
}
