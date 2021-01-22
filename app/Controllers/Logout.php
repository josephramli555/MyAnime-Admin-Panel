<?php namespace App\Controllers;

class Logout extends BaseController
{
	public function index()
	{
        session_destroy();
        return redirect()->to('/');
	}

	//--------------------------------------------------------------------

}
