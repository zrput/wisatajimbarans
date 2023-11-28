<?php

namespace App\Controllers;


class Admin extends BaseController
{
    private $objek_model;

    public function __construct()
    {
        $this->objek_model = new \App\Models\Mobjek();
    }
    
    public function index(): string
    {
 
    }

    public function dashboard(): string{
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/dashboard', $data);
    }

    

}
