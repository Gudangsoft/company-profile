<?php

namespace App\Controllers;
use App\Models\Mslider;
class Slider extends BaseController
{
    public function __construct(){
        $this->request= \Config\services::request();
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
        $this->Mslider= new Mslider();
    }
    public function tambah(){
        $path= 'file/slider';
        $width= ['1900','200'];
        $height= ['900','200'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_slider');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_slider' => 'uploaded[foto_slider]|max_size[foto_slider,5000]|mime_in[foto_slider,image/png,image/jpg,image/gif,image/jpeg]'
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
        $this->Mslider->tambah($this->request,$img);
        session()->setflashdata('msg','simpan');
        return redirect()->to(base_url('paneladmin/slider'));
    }
    public function edit(){
        $path= 'file/slider';
        $width= ['1900','200'];
        $height= ['900','200'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_slider');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_slider' => 'uploaded[foto_slider]|max_size[foto_slider,5000]|mime_in[foto_slider,image/png,image/jpg,image/gif,image/jpeg]'
            ]);
            if($validated){
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $img= $path.'/'.$newName;
                for ($i=0; $i < count($width); $i++){ 
                    $image->withFile($img)->resize($width[$i], $height[$i])->save($path.'/'.$width[$i].'_'.$newName);
                }
                $this->Mslider->edit($this->request,$img);
                //hapus
                $filegam= str_replace($path.'/', "", $this->request->getpost('fotolama'));
                if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
                for ($i=0; $i < count($width); $i++) { 
                    if(file_exists($path.'/'.$width[$i].'_'.$filegam)){ unlink($path.'/'.$width[$i].'_'.$filegam); }
                }
                session()->setflashdata('msg','edit');
                return redirect()->to(base_url('paneladmin/slider'));
            }
            else{
                $img= '';
                $this->Mslider->edit($this->request,$img);
                session()->setflashdata('msg','edit');
                return redirect()->to(base_url('paneladmin/slider'));
            }
        }
        else{
            $img= '';
            $this->Mslider->edit($this->request,$img);
            session()->setflashdata('msg','edit');
            return redirect()->to(base_url('paneladmin/slider'));
        }
    }
    public function hapus(){
        $path= 'file/slider';
        $width= ['1900','200'];
        $height= ['900','200'];
        $gal= $this->Mslider->getone($this->uri->getsegment(3))->getrow();
        //hapus
        $filegam= str_replace($path.'/', "", $gal->foto_slider);
        if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
        for ($i=0; $i < count($width); $i++) { 
            if(file_exists($path.'/'.$width[$i].'_'.$filegam)){ unlink($path.'/'.$width[$i].'_'.$filegam); }
        }
        $this->Mslider->hapus($this->uri->getsegment(3));
        session()->setflashdata('msg','hapus');
        echo 'oke';
    }
}