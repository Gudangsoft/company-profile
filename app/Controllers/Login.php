<?php

namespace App\Controllers;
use App\Models\Maplikasi;
use App\Models\Mlogin;
class Login extends BaseController
{
   public function __construct(){
      $this->request= \Config\services::request();
      $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
      $this->Maplikasi= new Maplikasi();
      $this->Mlogin= new Mlogin();
   }
   public function index(){
      if(session()->get('id_pengguna')!=null){
         return redirect()->to(base_url('paneladmin'));
      }
      $d['aplikasi']= $this->Maplikasi->data();
      echo view('login',$d);
   }
   public function authlogin(){
      $cek= $this->Mlogin->ceklogin($this->request);
      if($cek->getrowcount() > 0){
         $data= $cek->getrow();
         session()->set('id_pengguna',$data->id_pengguna);
			session()->set('login','isloginadmin');
			$this->Mlogin->lastadmin($data->id_pengguna);
         return redirect()->to(base_url('paneladmin'));
      }
      else{
         session()->setflashdata('msg', 'gagal');
         return redirect()->to(base_url('toadmin'));
      }
   }
   public function logout(){
      session()->remove('id_pengguna');
		session()->remove('login');
      session()->remove('level');
      echo 'oke';
   }
}
