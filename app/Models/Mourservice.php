<?php

namespace App\Models;

use CodeIgniter\Model;

class Mourservice extends Model
{
    public function __construct(){
        parent::__construct();
        $db= \Config\Database::connect();
        $this->t_ourservice= $db->table('ourservice');
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
    }
    public function data(){
        return $this->t_ourservice->orderby('urutan_ourservice','asc')->get();
    }
    public function tambah($request,$img){
        $d['judul_ourservice']= $request->getpost('judul_ourservice');
        $d['isi_ourservice']= $request->getpost('isi_ourservice');
        $d['link_ourservice']= $request->getpost('link_ourservice');
        $d['urutan_ourservice']= $request->getpost('urutan_ourservice');
        if($img!=null){
            $d['foto_ourservice']= $img;
        }
        else{
            $d['foto_ourservice']= 'file/ourservice/noimage.png';
        }
        $this->t_ourservice->insert($d);
    }
    public function getone($id_ourservice){
        return $this->t_ourservice->where('id_ourservice',$id_ourservice)->get();
    }
    public function edit($request,$img){
        $d['judul_ourservice']= $request->getpost('judul_ourservice');
        $d['isi_ourservice']= $request->getpost('isi_ourservice');
        $d['link_ourservice']= $request->getpost('link_ourservice');
        $d['urutan_ourservice']= $request->getpost('urutan_ourservice');
        if($img!=null){
            $d['foto_ourservice']= $img;
        }
        $this->t_ourservice->where('id_ourservice',$request->getpost('id_ourservice'))->update($d);
    }
    public function hapus($id_ourservice){
        return $this->t_ourservice->where('id_ourservice',$id_ourservice)->delete();
    }
}
