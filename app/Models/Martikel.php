<?php

namespace App\Models;

use CodeIgniter\Model;

class Martikel extends Model
{
    public function __construct(){
        parent::__construct();
        $db= \Config\Database::connect();
        $this->t_artikel= $db->table('artikel');
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
    }
    public function data(){
        return $this->t_artikel->join('kategori','kategori.id_kategori=artikel.id_kategori_artikel','left')->orderby('id_artikel','desc')->get();
    }
    public function datatampil(){
        return $this->t_artikel->join('kategori','kategori.id_kategori=artikel.id_kategori_artikel','left')->where('spam_artikel',0)->orderby('id_artikel','desc')->get();
    }
    public function datatampiltag($id_kategori){
        return $this->t_artikel->join('kategori','kategori.id_kategori=artikel.id_kategori_artikel','left')->where('spam_artikel',0)->where('id_kategori_artikel',$id_kategori)->orderby('id_artikel','desc')->get();
    }
    public function datatampillimit($limit){
        return $this->t_artikel->join('kategori','kategori.id_kategori=artikel.id_kategori_artikel','left')->where('spam_artikel',0)->orderby('id_artikel','desc')->limit($limit)->get();
    }
    public function datapopularlimit($limit){
        return $this->t_artikel->join('kategori','kategori.id_kategori=artikel.id_kategori_artikel','left')->where('spam_artikel',0)->orderby('dilihat_artikel','desc')->limit($limit)->get();
    }
    public function datakategori($id_kategori){
        return $this->t_artikel->join('kategori','kategori.id_kategori=artikel.id_kategori_artikel','left')->where('spam_artikel',0)->where('id_kategori_artikel',$id_kategori)->get();
    }
    public function datafilter($show,$page){
        $newpage= $page-1;
        $mulai= $newpage*$show;
        $batas= $show;
        return $this->t_artikel->join('kategori','kategori.id_kategori=artikel.id_kategori_artikel','left')->where('spam_artikel',0)->orderby('id_artikel','desc')->limit($batas,$mulai)->get();
    }
    public function datafiltertag($id_kategori,$show,$page){
        $newpage= $page-1;
        $mulai= $newpage*$show;
        $batas= $show;
        return $this->t_artikel->join('kategori','kategori.id_kategori=artikel.id_kategori_artikel','left')->where('id_kategori_artikel',$id_kategori)->where('spam_artikel',0)->orderby('id_artikel','desc')->limit($batas,$mulai)->get();
    }
    public function tambah($request,$img){
        $d['id_kategori_artikel']= $request->getpost('id_kategori_artikel');
        $d['judul_artikel']= $request->getpost('judul_artikel');
        if($img!=null){
			$d['foto_artikel']= $img;
		}
		else{
			$d['foto_artikel']= 'file/artikel/noimage.png';
		}
        $d['isi_artikel']= $request->getpost('isi_artikel');
        $d['slug_artikel']= slug($request->getpost('judul_artikel'));
        $d['dilihat_artikel']= 0;
        $d['tag_artikel']= $request->getpost('tag_artikel');
        $d['spam_artikel']= $request->getpost('spam_artikel');
        $d['tglinput_artikel']= date('Y-m-d H:i:s');
        $this->t_artikel->insert($d);
    }
    public function edit($request,$img){
        $d['id_kategori_artikel']= $request->getpost('id_kategori_artikel');
        $d['judul_artikel']= $request->getpost('judul_artikel');
        if($img!=null){
			$d['foto_artikel']= $img;
		}
        $d['isi_artikel']= $request->getpost('isi_artikel');
        $d['slug_artikel']= slug($request->getpost('judul_artikel'));
        $d['tag_artikel']= $request->getpost('tag_artikel');
        $d['spam_artikel']= $request->getpost('spam_artikel');
        $this->t_artikel->where('id_artikel',$request->getpost('id_artikel'))->update($d);
    }
    public function getone($id_artikel){
        return $this->t_artikel->join('kategori','kategori.id_kategori=artikel.id_kategori_artikel','left')->where('id_artikel',$id_artikel)->get();
    }
    public function getoneslug($slug_artikel){
        return $this->t_artikel->join('kategori','kategori.id_kategori=artikel.id_kategori_artikel','left')->where('slug_artikel',$slug_artikel)->get();
    }
    public function hapus($id_artikel){
        return $this->t_artikel->where('id_artikel',$id_artikel)->delete();
    }
    public function dilihat($id_artikel,$lihat){
        $d['dilihat_artikel']= $lihat;
        $this->t_artikel->where('id_artikel',$id_artikel)->update($d);
    }
}
