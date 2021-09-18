<?php

namespace App\Models;

use CodeIgniter\Model;

class Mgaleri extends Model
{
    public function __construct(){
        parent::__construct();
        $db= \Config\Database::connect();
        $this->t_galeri= $db->table('galeri');
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
    }
    public function data(){
        return $this->t_galeri->orderby('id_galeri','desc')->get();
    }
    public function datalimit($limit){
        return $this->t_galeri->orderby('id_galeri','desc')->limit($limit)->get();
    }
    public function datafilter($show,$page){
        $newpage= $page-1;
        $mulai= $newpage*$show;
        $batas= $show;
        return $this->t_galeri->orderby('id_galeri','desc')->limit($batas,$mulai)->get();
    }
    public function tambah($request,$img){
        $d['ket_galeri']= $request->getpost('ket_galeri');
        if($img!=null){
            $d['foto_galeri']= $img;
        }
        else{
            $d['foto_galeri']= 'file/galeri/noimage.png';
        }
        $this->t_galeri->insert($d);
    }
    public function getone($id_galeri){
        return $this->t_galeri->where('id_galeri',$id_galeri)->get();
    }
    public function edit($request,$img){
        $d['ket_galeri']= $request->getpost('ket_galeri');
        if($img!=null){
            $d['foto_galeri']= $img;
        }
        $this->t_galeri->where('id_galeri',$request->getpost('id_galeri'))->update($d);
    }
    public function hapus($id_galeri){
        return $this->t_galeri->where('id_galeri',$id_galeri)->delete();
    }
}
