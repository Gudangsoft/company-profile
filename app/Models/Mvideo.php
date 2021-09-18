<?php

namespace App\Models;

use CodeIgniter\Model;

class Mvideo extends Model
{
    public function __construct(){
        parent::__construct();
        $db= \Config\Database::connect();
        $this->t_video= $db->table('video');
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
    }
    public function data(){
        return $this->t_video->orderby('id_video','asc')->get();
    }
    public function datafilter($show,$page){
        $newpage= $page-1;
        $mulai= $newpage*$show;
        $batas= $show;
        return $this->t_video->orderby('id_video','desc')->limit($batas,$mulai)->get();
    }
    public function tambah($request){
        $d['ket_video']= $request->getpost('ket_video');
        $d['youtube_video']= $request->getpost('youtube_video');
        $this->t_video->insert($d);
    }
    public function getone($id_video){
        return $this->t_video->where('id_video',$id_video)->get();
    }
    public function edit($request){
        $d['ket_video']= $request->getpost('ket_video');
        $d['youtube_video']= $request->getpost('youtube_video');
        $this->t_video->where('id_video',$request->getpost('id_video'))->update($d);
    }
    public function hapus($id_video){
        return $this->t_video->where('id_video',$id_video)->delete();
    }
}
