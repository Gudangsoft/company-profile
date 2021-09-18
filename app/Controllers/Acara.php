<?php

namespace App\Controllers;
use App\Models\Macara;
class Acara extends BaseController
{
    public function __construct(){
        $this->request= \Config\services::request();
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
        $this->Macara= new Macara();
    }
    public function tambah(){
        $path= 'file/acara';
        $width= ['200', '400','900'];
        $height= ['150', '300','400'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_acara');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_acara' => 'uploaded[foto_acara]|max_size[foto_acara,5000]|mime_in[foto_acara,image/png,image/jpg,image/gif,image/jpeg]'
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
        $this->Macara->tambah($this->request,$img);
        session()->setflashdata('msg','simpan');
        return redirect()->to(base_url('paneladmin/acara'));
    }
    public function edit(){
        $path= 'file/acara';
        $width= ['200', '400','900'];
        $height= ['150', '300','400'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_acara');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_acara' => 'uploaded[foto_acara]|max_size[foto_acara,5000]|mime_in[foto_acara,image/png,image/jpg,image/gif,image/jpeg]'
            ]);
            if($validated){
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $img= $path.'/'.$newName;
                for ($i=0; $i < count($width); $i++){ 
                    $image->withFile($img)->resize($width[$i], $height[$i])->save($path.'/'.$width[$i].'_'.$newName);
                }
                $this->Macara->edit($this->request,$img);
                //hapus
                $filegam= str_replace($path.'/', "", $this->request->getpost('fotolama'));
                if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
                for ($i=0; $i < count($width); $i++) { 
                    if(file_exists($path.'/'.$width[$i].'_'.$filegam)){ unlink($path.'/'.$width[$i].'_'.$filegam); }
                }
                session()->setflashdata('msg','edit');
                return redirect()->to(base_url('paneladmin/acara'));
            }
            else{
                $img= '';
                $this->Macara->edit($this->request,$img);
                session()->setflashdata('msg','edit');
                return redirect()->to(base_url('paneladmin/acara'));
            }
        }
        else{
            $img= '';
            $this->Macara->edit($this->request,$img);
            session()->setflashdata('msg','edit');
            return redirect()->to(base_url('paneladmin/acara'));
        }
    }
    public function hapus(){
        $path= 'file/acara';
        $width= ['200', '400','900'];
        $height= ['150', '300','400'];
        $art= $this->Macara->getone($this->uri->getsegment(3))->getrow();
        //hapus
        $filegam= str_replace($path.'/', "", $art->foto_acara);
        if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
		for ($i=0; $i < count($width); $i++) { 
		    if(file_exists($path.'/'.$width[$i].'_'.$filegam)){ unlink($path.'/'.$width[$i].'_'.$filegam); }
		}
        $this->Macara->hapus($this->uri->getsegment(3));
        session()->setflashdata('msg','hapus');
        echo 'oke';
    }
}
