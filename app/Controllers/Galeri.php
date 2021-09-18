<?php

namespace App\Controllers;
use App\Models\Mgaleri;
class Galeri extends BaseController
{
    public function __construct(){
        $this->request= \Config\services::request();
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
        $this->Mgaleri= new Mgaleri();
    }
    public function tambah(){
        $path= 'file/galeri';
        $width= ['300'];
        $height= ['300'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_galeri');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_galeri' => 'uploaded[foto_galeri]|max_size[foto_galeri,5000]|mime_in[foto_galeri,image/png,image/jpg,image/gif,image/jpeg]'
            ]);
            if($validated){
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $img= $path.'/'.$newName;
                for ($i=0; $i < count($width); $i++){ 
                    $image->withFile($img)->resize($width[$i], $height[$i])->save($path.'/'.$width[$i].'_'.$newName);
                }
            }
            else{
                $img= '';
            }
        }
        else{
            $img= '';
        }
        $this->Mgaleri->tambah($this->request,$img);
        session()->setflashdata('msg','simpan');
        return redirect()->to(base_url('paneladmin/galeri'));
    }
    public function edit(){
        $path= 'file/galeri';
        $width= ['300'];
        $height= ['300'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_galeri');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_galeri' => 'uploaded[foto_galeri]|max_size[foto_galeri,5000]|mime_in[foto_galeri,image/png,image/jpg,image/gif,image/jpeg]'
            ]);
            if($validated){
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $img= $path.'/'.$newName;
                for ($i=0; $i < count($width); $i++){ 
                    $image->withFile($img)->resize($width[$i], $height[$i])->save($path.'/'.$width[$i].'_'.$newName);
                }
                $this->Mgaleri->edit($this->request,$img);
                //hapus
                $filegam= str_replace($path.'/', "", $this->request->getpost('fotolama'));
                if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
                for ($i=0; $i < count($width); $i++) { 
                    if(file_exists($path.'/'.$width[$i].'_'.$filegam)){ unlink($path.'/'.$width[$i].'_'.$filegam); }
                }
                session()->setflashdata('msg','edit');
                return redirect()->to(base_url('paneladmin/galeri'));
            }
            else{
                $img= '';
                $this->Mgaleri->edit($this->request,$img);
                session()->setflashdata('msg','edit');
                return redirect()->to(base_url('paneladmin/galeri'));
            }
        }
        else{
            $img= '';
            $this->Mgaleri->edit($this->request,$img);
            session()->setflashdata('msg','edit');
            return redirect()->to(base_url('paneladmin/galeri'));
        }
    }
    public function hapus(){
        $path= 'file/galeri';
        $width= ['300'];
        $height= ['300'];
        $gal= $this->Mgaleri->getone($this->uri->getsegment(3))->getrow();
        //hapus
        $filegam= str_replace($path.'/', "", $gal->foto_galeri);
        if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
        for ($i=0; $i < count($width); $i++) { 
            if(file_exists($path.'/'.$width[$i].'_'.$filegam)){ unlink($path.'/'.$width[$i].'_'.$filegam); }
        }
        $this->Mgaleri->hapus($this->uri->getsegment(3));
        session()->setflashdata('msg','hapus');
        echo 'oke';
    }
}
