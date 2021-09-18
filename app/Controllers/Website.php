<?php

namespace App\Controllers;
use Template;
use App\Models\Maplikasi;
use App\Models\Mkategori;
use App\Models\Mhalaman;
use App\Models\Martikel;
use App\Models\Mgaleri;
use App\Models\Mslider;
use App\Models\Mvideo;
use App\Models\Mmenu;
use App\Models\Mourservice;
use App\Models\Macara;
class Website extends BaseController
{
   public function __construct(){
   	$this->request= \Config\services::request();
      $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
      $this->Maplikasi= new Maplikasi();
      $this->Mkategori= new Mkategori();
      $this->Mhalaman= new Mhalaman();
      $this->Martikel= new Martikel();
      $this->Mgaleri= new Mgaleri();
      $this->Mslider= new Mslider();
      $this->Mvideo= new Mvideo();
      $this->Mmenu= new Mmenu();
      $this->Mourservice= new Mourservice();
      $this->Macara= new Macara();
      
		$this->Maplikasi->pengunjung();
   }
   public function index(){
      // utama
      $d['aplikasi']= $this->Maplikasi->data();
      $app= $d['aplikasi']->getrow();
      $d['title']= "Home";
      $d['ogtitle']= $app->nama_app;
      $d['ogdescription']= $app->deskripsi_app;
      $d['ogimage']= base_url($app->logo_app);
      $d['ogurl']= base_url();
      $d['menu']= $this->Mmenu->dataparent();

      $d['slider']= $this->Mslider->data();
      $d['ourservice']= $this->Mourservice->data();
      $d['acara']= $this->Macara->datalimit(3);
      $d['artikeluta']= $this->Martikel->datatampillimit(1);
      $d['artikelsam']= $this->Martikel->datatampillimit(5);
      $d['galeri']= $this->Mgaleri->datalimit(6);
      return Template::website('website/home',$d);
   }
//acara
   public function acara(){
      if($this->request->getpostget('show')!=null){
         $show= $this->request->getpostget('show');
      }
      else{
         $show= 6;
      }
      if($this->request->getpostget('page')!=null){
         $page= $this->request->getpostget('page');
      }
      else{
         $page= 1;
      }
      // utama
      $d['classhead']= 'green';
      $d['aplikasi']= $this->Maplikasi->data();
      $app= $d['aplikasi']->getrow();
      $d['title']= "Acara Sekolah";
      $d['ogtitle']= "Acara Sekolah";
      $d['ogdescription']= $app->deskripsi_app;
      $d['ogimage']= base_url($app->logo_app);
      $d['menu']= $this->Mmenu->dataparent();

      $d['allacara']= $this->Macara->data();
      $d['acara']= $this->Macara->datafilter($show,$page);
      return Template::website('website/acara/data',$d);
   }
   public function lihatacara(){
      $acara= $this->Macara->getoneslug($this->uri->getsegment(2))->getrow();
      if($acara==null){
         return redirect()->to(base_url('notfound'));
      }
      // utama
      $d['classhead']= 'green';
      $d['aplikasi']= $this->Maplikasi->data();
      $app= $d['aplikasi']->getrow();
      $d['title']= $acara->judul_acara;
      $d['ogtitle']= $acara->judul_acara;
      $d['ogdescription']= sub(100,$acara->isi_acara).'..';
      $d['ogimage']= base_url(foto('200','acara',$acara->foto_acara));
      $d['menu']= $this->Mmenu->dataparent();

      $d['acara']= $acara;
      $d['kategori']= $this->Mkategori->data();
      $d['popular']= $this->Martikel->datapopularlimit(3);
      return Template::website('website/acara/detail',$d);
   }
//artikel
   public function artikel(){
      if($this->request->getpostget('show')!=null){
         $show= $this->request->getpostget('show');
      }
      else{
         $show= 6;
      }
      if($this->request->getpostget('page')!=null){
         $page= $this->request->getpostget('page');
      }
      else{
         $page= 1;
      }
      // utama
      $d['classhead']= 'green';
      $d['aplikasi']= $this->Maplikasi->data();
      $app= $d['aplikasi']->getrow();
      $d['title']= "Artikel";
      $d['ogtitle']= "Artikel";
      $d['ogdescription']= $app->deskripsi_app;
      $d['ogimage']= base_url($app->logo_app);
      $d['menu']= $this->Mmenu->dataparent();

      $d['allartikel']= $this->Martikel->datatampil();
      $d['artikel']= $this->Martikel->datafilter($show,$page);
      $d['kategori']= $this->Mkategori->data();
      $d['popular']= $this->Martikel->datapopularlimit(3);
      return Template::website('website/artikel/data',$d);
   }
   public function kategori(){
      $kategori= $this->Mkategori->getoneslug($this->uri->getsegment(2))->getrow();
      if($kategori==null){
         return redirect()->to(base_url('notfound'));
      }
      if($this->request->getpostget('show')!=null){
         $show= $this->request->getpostget('show');
      }
      else{
         $show= 6;
      }
      if($this->request->getpostget('page')!=null){
         $page= $this->request->getpostget('page');
      }
      else{
         $page= 1;
      }
      // utama
      $d['classhead']= 'green';
      $d['aplikasi']= $this->Maplikasi->data();
      $app= $d['aplikasi']->getrow();
      $d['title']= $kategori->nama_kategori;
      $d['ogtitle']= $kategori->nama_kategori;
      $d['ogdescription']= $app->deskripsi_app;
      $d['ogimage']= base_url($app->logo_app);
      $d['menu']= $this->Mmenu->dataparent();

      $d['getka']= $kategori;
      $d['allartikel']= $this->Martikel->datatampiltag($kategori->id_kategori);
      $d['artikel']= $this->Martikel->datafiltertag($kategori->id_kategori,$show,$page);
      $d['kategori']= $this->Mkategori->data();
      $d['popular']= $this->Martikel->datapopularlimit(3);
      return Template::website('website/artikel/tag',$d);
   }
   public function lihatartikel(){
      $artikel= $this->Martikel->getoneslug($this->uri->getsegment(2))->getrow();
      if($artikel==null){
         return redirect()->to(base_url('notfound'));
      }
      // utama
      $d['classhead']= 'green';
      $d['aplikasi']= $this->Maplikasi->data();
      $app= $d['aplikasi']->getrow();
      $d['title']= $artikel->judul_artikel;
      $d['ogtitle']= $artikel->judul_artikel;
      $d['ogdescription']= sub(100,$artikel->isi_artikel).'..';
      $d['ogimage']= base_url(folder('200','artikel',$artikel->foto_artikel));
      $d['menu']= $this->Mmenu->dataparent();

      $li= $artikel->dilihat_artikel+1;
      $this->Martikel->dilihat($artikel->id_artikel,$li);
      $artikel= $this->Martikel->getoneslug($this->uri->getsegment(2))->getrow();
      $d['artikel']= $artikel;
      $d['kategori']= $this->Mkategori->data();
      $d['popular']= $this->Martikel->datapopularlimit(3);
      return Template::website('website/artikel/detail',$d);
   }
//halaman
   public function page(){
      $halaman= $this->Mhalaman->getoneslug($this->uri->getsegment(2))->getrow();
      if($halaman==null){
         return redirect()->to(base_url('notfound'));
      }
      // utama
      $d['classhead']= 'green';
      $d['aplikasi']= $this->Maplikasi->data();
      $app= $d['aplikasi']->getrow();
      $d['title']= $halaman->judul_halaman;
      $d['ogtitle']= $halaman->judul_halaman;
      $d['ogdescription']= sub(100,$halaman->isi_halaman).'..';
      $d['ogimage']= base_url($app->logo_app);
      $d['menu']= $this->Mmenu->dataparent();

      $d['halaman']= $halaman;
      return Template::website('website/halaman/detail',$d);
   }
//kontak
   public function kontak(){
      // utama
      $d['classhead']= 'green';
      $d['aplikasi']= $this->Maplikasi->data();
      $app= $d['aplikasi']->getrow();
      $d['title']= "Kontak";
      $d['ogtitle']= $app->nama_app;
      $d['ogdescription']= $app->deskripsi_app;
      $d['ogimage']= base_url($app->logo_app);
      $d['ogurl']= base_url();
      $d['menu']= $this->Mmenu->dataparent();
      return Template::website('website/kontak',$d);
   }
//foto
   public function foto(){
      if($this->request->getpostget('show')!=null){
         $show= $this->request->getpostget('show');
      }
      else{
         $show= 8;
      }
      if($this->request->getpostget('page')!=null){
         $page= $this->request->getpostget('page');
      }
      else{
         $page= 1;
      }
      // utama
      $d['classhead']= 'green';
      $d['aplikasi']= $this->Maplikasi->data();
      $app= $d['aplikasi']->getrow();
      $d['title']= "Galeri Foto";
      $d['ogtitle']= "Galeri Foto";
      $d['ogdescription']= $app->deskripsi_app;
      $d['ogimage']= base_url($app->logo_app);
      $d['menu']= $this->Mmenu->dataparent();

      $d['allgaleri']= $this->Mgaleri->data();
      $d['galeri']= $this->Mgaleri->datafilter($show,$page);
      return Template::website('website/galeri/foto',$d);
   }
//video
   public function video(){
      if($this->request->getpostget('show')!=null){
         $show= $this->request->getpostget('show');
      }
      else{
         $show= 6;
      }
      if($this->request->getpostget('page')!=null){
         $page= $this->request->getpostget('page');
      }
      else{
         $page= 1;
      }
      // utama
      $d['classhead']= 'green';
      $d['aplikasi']= $this->Maplikasi->data();
      $app= $d['aplikasi']->getrow();
      $d['title']= "Galeri Video";
      $d['ogtitle']= "Galeri Video";
      $d['ogdescription']= $app->deskripsi_app;
      $d['ogimage']= base_url($app->logo_app);
      $d['menu']= $this->Mmenu->dataparent();

      $d['allvideo']= $this->Mvideo->data();
      $d['video']= $this->Mvideo->datafilter($show,$page);
      return Template::website('website/galeri/video',$d);
   }
}
