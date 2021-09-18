<?php

namespace App\Models;

use CodeIgniter\Model;

class Mslider extends Model
{
    public function __construct(){
        parent::__construct();
        $db= \Config\Database::connect();
        $this->t_slider= $db->table('slider');
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
    }
    public function data(){
        return $this->t_slider->orderby('urutan_slider','asc')->get();
    }
    public function tambah($request,$img){
        $d['judul_slider']= $request->getpost('judul_slider');
        $d['isi_slider']= $request->getpost('isi_slider');
        $d['link_slider']= $request->getpost('link_slider');
        $d['urutan_slider']= $request->getpost('urutan_slider');
        if($img!=null){
            $d['foto_slider']= $img;
        }
        else{
            $d['foto_slider']= 'file/slider/noimage.png';
        }
        $this->t_slider->insert($d);
    }
    public function getone($id_slider){
        return $this->t_slider->where('id_slider',$id_slider)->get();
    }
    public function edit($request,$img){
        $d['judul_slider']= $request->getpost('judul_slider');
        $d['isi_slider']= $request->getpost('isi_slider');
        $d['link_slider']= $request->getpost('link_slider');
        $d['urutan_slider']= $request->getpost('urutan_slider');
        if($img!=null){
            $d['foto_slider']= $img;
        }
        $this->t_slider->where('id_slider',$request->getpost('id_slider'))->update($d);
    }
    public function hapus($id_slider){
        return $this->t_slider->where('id_slider',$id_slider)->delete();
    }
}
