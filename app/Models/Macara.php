<?php

namespace App\Models;

use CodeIgniter\Model;

class Macara extends Model
{
    public function __construct(){
        parent::__construct();
        $db= \Config\Database::connect();
        $this->t_acara= $db->table('acara');
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
    }
    public function data(){
        return $this->t_acara->orderby('id_acara','desc')->get();
    }
    public function datalimit($limit){
        return $this->t_acara->orderby('id_acara','desc')->limit($limit)->get();
    }
    public function datafilter($show,$page){
        $newpage= $page-1;
        $mulai= $newpage*$show;
        $batas= $show;
        return $this->t_acara->orderby('id_acara','desc')->limit($batas,$mulai)->get();
    }
    public function tambah($request,$img){
        $d['judul_acara']= $request->getpost('judul_acara');
        if($img!=null){
			$d['foto_acara']= $img;
		}
		else{
			$d['foto_acara']= 'file/acara/noimage.png';
		}
        $d['isi_acara']= $request->getpost('isi_acara');
        $d['slug_acara']= slug($request->getpost('judul_acara'));
        $d['tgl_acara']= ymd($request->getpost('tgl_acara'));
        $d['mulai_acara']= $request->getpost('mulai_acara');
        $d['selesai_acara']= $request->getpost('selesai_acara');
        $d['tempat_acara']= $request->getpost('tempat_acara');
        $d['tglinput_acara']= date('Y-m-d H:i:s');
        $this->t_acara->insert($d);
    }
    public function edit($request,$img){
        $d['judul_acara']= $request->getpost('judul_acara');
        if($img!=null){
			$d['foto_acara']= $img;
		}
        $d['isi_acara']= $request->getpost('isi_acara');
        $d['slug_acara']= slug($request->getpost('judul_acara'));
        $d['tgl_acara']= ymd($request->getpost('tgl_acara'));
        $d['mulai_acara']= $request->getpost('mulai_acara');
        $d['selesai_acara']= $request->getpost('selesai_acara');
        $d['tempat_acara']= $request->getpost('tempat_acara');
        $this->t_acara->where('id_acara',$request->getpost('id_acara'))->update($d);
    }
    public function getone($id_acara){
        return $this->t_acara->where('id_acara',$id_acara)->get();
    }
    public function hapus($id_acara){
        return $this->t_acara->where('id_acara',$id_acara)->delete();
    }
    public function getoneslug($slug){
        return $this->t_acara->where('slug_acara',$slug)->get();
    }
}
