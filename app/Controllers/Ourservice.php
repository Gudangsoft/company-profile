<?php

namespace App\Controllers;
use App\Models\Mourservice;
class Ourservice extends BaseController
{
    public function __construct(){
        $this->request= \Config\services::request();
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
        $this->Mourservice= new Mourservice();
    }
    public function tambah(){
        $path= 'file/ourservice';
        $width= ['200'];
        $height= ['200'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_ourservice');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_ourservice' => 'uploaded[foto_ourservice]|max_size[foto_ourservice,5000]|mime_in[foto_ourservice,image/png,image/jpg,image/gif,image/jpeg]'
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
        $this->Mourservice->tambah($this->request,$img);
        session()->setflashdata('msg','simpan');
        return redirect()->to(base_url('paneladmin/ourservice'));
    }
    public function edit(){
        $path= 'file/ourservice';
        $width= ['200'];
        $height= ['200'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_ourservice');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_ourservice' => 'uploaded[foto_ourservice]|max_size[foto_ourservice,5000]|mime_in[foto_ourservice,image/png,image/jpg,image/gif,image/jpeg]'
            ]);
            if($validated){
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $img= $path.'/'.$newName;
                for ($i=0; $i < count($width); $i++){ 
                    $image->withFile($img)->resize($width[$i], $height[$i])->save($path.'/'.$width[$i].'_'.$newName);
                }
                $this->Mourservice->edit($this->request,$img);
                //hapus
                $filegam= str_replace($path.'/', "", $this->request->getpost('fotolama'));
                if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
                for ($i=0; $i < count($width); $i++) { 
                    if(file_exists($path.'/'.$width[$i].'_'.$filegam)){ unlink($path.'/'.$width[$i].'_'.$filegam); }
                }
                session()->setflashdata('msg','edit');
                return redirect()->to(base_url('paneladmin/ourservice'));
            }
            else{
                $img= '';
                $this->Mourservice->edit($this->request,$img);
                session()->setflashdata('msg','edit');
                return redirect()->to(base_url('paneladmin/ourservice'));
            }
        }
        else{
            $img= '';
            $this->Mourservice->edit($this->request,$img);
            session()->setflashdata('msg','edit');
            return redirect()->to(base_url('paneladmin/ourservice'));
        }
    }
    public function hapus(){
        $path= 'file/ourservice';
        $width= ['200'];
        $height= ['200'];
        $gal= $this->Mourservice->getone($this->uri->getsegment(3))->getrow();
        //hapus
        $filegam= str_replace($path.'/', "", $gal->foto_ourservice);
        if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
        for ($i=0; $i < count($width); $i++) { 
            if(file_exists($path.'/'.$width[$i].'_'.$filegam)){ unlink($path.'/'.$width[$i].'_'.$filegam); }
        }
        $this->Mourservice->hapus($this->uri->getsegment(3));
        session()->setflashdata('msg','hapus');
        echo 'oke';
    }
}
