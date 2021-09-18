<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkategori extends Model
{
    public function __construct(){
        parent::__construct();
        $db= \Config\Database::connect();
        $this->t_kategori= $db->table('kategori');
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
    }
    public function data(){
        return $this->t_kategori->select('*')->select("(SELECT count(id_artikel) from artikel where id_kategori_artikel=id_kategori) as jumart")->orderby('nama_kategori','asc')->get();
    }
    public function tambah($request){
        $d['nama_kategori']= $request->getpost('nama_kategori');
        $d['slug_kategori']= slug($request->getpost('nama_kategori'));
        $this->t_kategori->insert($d);
    }
    public function getone($id_kategori){
        return $this->t_kategori->where('id_kategori',$id_kategori)->get();
    }
    public function getoneslug($slug_kategori){
        return $this->t_kategori->where('slug_kategori',$slug_kategori)->get();
    }
    public function edit($request){
        $d['nama_kategori']= $request->getpost('nama_kategori');
        $d['slug_kategori']= slug($request->getpost('nama_kategori'));
        $this->t_kategori->where('id_kategori',$request->getpost('id_kategori'))->update($d);
    }
    public function hapus($id_kategori){
        return $this->t_kategori->where('id_kategori',$id_kategori)->delete();
    }
}
