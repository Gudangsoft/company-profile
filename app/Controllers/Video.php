<?php

namespace App\Controllers;
use App\Models\Mvideo;
class Video extends BaseController
{
    public function __construct(){
        $this->request= \Config\services::request();
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
        $this->Mvideo= new Mvideo();
    }
    public function tambah(){
        $this->Mvideo->tambah($this->request);
        session()->setflashdata('msg','simpan');
        return redirect()->to(base_url('paneladmin/video'));
    }
    public function edit(){
        $this->Mvideo->edit($this->request);
        session()->setflashdata('msg','edit');
        return redirect()->to(base_url('paneladmin/video'));
    }
    public function hapus(){
        $this->Mvideo->hapus($this->uri->getsegment(3));
        session()->setflashdata('msg','hapus');
        echo 'oke';
    }
}
