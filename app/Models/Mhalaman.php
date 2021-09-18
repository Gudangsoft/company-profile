<?php

namespace App\Models;

use CodeIgniter\Model;

class Mhalaman extends Model
{
    public function __construct(){
        parent::__construct();
        $db= \Config\Database::connect();
        $this->t_halaman= $db->table('halaman');
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
    }
    public function data(){
        return $this->t_halaman->orderby('id_halaman','asc')->get();
    }
    public function tambah($request){
        $d['judul_halaman']= $request->getpost('judul_halaman');
        $d['isi_halaman']= $request->getpost('isi_halaman');
        $d['slug_halaman']= slug($request->getpost('judul_halaman'));
        $d['tglinput_halaman']= date('Y-m-d H:i:s');
        $this->t_halaman->insert($d);
    }
    public function getone($id_halaman){
        return $this->t_halaman->where('id_halaman',$id_halaman)->get();
    }
    public function getoneslug($slug_halaman){
        return $this->t_halaman->where('slug_halaman',$slug_halaman)->get();
    }
    public function edit($request){
        $d['judul_halaman']= $request->getpost('judul_halaman');
        $d['isi_halaman']= $request->getpost('isi_halaman');
        $d['slug_halaman']= slug($request->getpost('judul_halaman'));
        $this->t_halaman->where('id_halaman',$request->getpost('id_halaman'))->update($d);
    }
    public function hapus($id_halaman){
        return $this->t_halaman->where('id_halaman',$id_halaman)->delete();
    }
}
