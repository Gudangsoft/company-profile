<?php

namespace App\Controllers;
use App\Models\Mhalaman;
class Halaman extends BaseController
{
    public function __construct(){
        $this->request= \Config\services::request();
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
        $this->Mhalaman= new Mhalaman();
    }
    public function tambah(){
        $this->Mhalaman->tambah($this->request);
        session()->setflashdata('msg','simpan');
        return redirect()->to(base_url('paneladmin/halaman'));
    }
    public function edit(){
        $this->Mhalaman->edit($this->request);
        session()->setflashdata('msg','edit');
        return redirect()->to(base_url('paneladmin/halaman'));
    }
    public function hapus(){
        $this->Mhalaman->hapus($this->uri->getsegment(3));
        session()->setflashdata('msg','hapus');
        echo 'oke';
    }
}
