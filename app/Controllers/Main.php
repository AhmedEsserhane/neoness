<?php

namespace App\Controllers;

class Main extends BaseController
{
    public function index()
    {
        $locale = $this->request->getLocale();
        echo view('templates/header');
        echo view('main/index');
        echo view('templates/footer');
    }
    public function contact()
    
    {
        $locale = $this->request->getLocale();
        echo view('templates/header');
        echo view('main/contact');
        echo view('templates/footer');
    }
    public function about()
    {
        $locale = $this->request->getLocale();
        echo view('templates/header');
        echo view('main/about');
        echo view('templates/footer');
    }
}
