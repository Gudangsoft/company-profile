<?php

namespace App\Controllers;
use App\Models\Martikel;
class Artikel extends BaseController
{
    public function __construct(){
        $this->request= \Config\services::request();
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
        $this->Martikel= new Martikel();
    }
    public function tambah(){
        $path= 'file/artikel';
        $width= ['200', '500','900'];
        $height= ['150', '250','400'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_artikel');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_artikel' => 'uploaded[foto_artikel]|max_size[foto_artikel,5000]|mime_in[foto_artikel,image/png,image/jpg,image/gif,image/jpeg]'
            ]);
            if($validated){
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $img= $path.'/'.$newName;
                for ($i=0; $i < count($width); $i++){ 
                    $image->withFile($img)->resize($width[$i], $height[$i])->save($path.'/'.$width[$i].'/'.$newName);
                }
            }
            else{
                $img= '';
            }
        }
        else{
            $img= '';
        }
        $this->Martikel->tambah($this->request,$img);
        session()->setflashdata('msg','simpan');
        return redirect()->to(base_url('paneladmin/artikel'));
    }
    public function edit(){
        $path= 'file/artikel';
        $width= ['200', '500','900'];
        $height= ['150', '250','400'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_artikel');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_artikel' => 'uploaded[foto_artikel]|max_size[foto_artikel,5000]|mime_in[foto_artikel,image/png,image/jpg,image/gif,image/jpeg]'
            ]);
            if($validated){
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $img= $path.'/'.$newName;
                for ($i=0; $i < count($width); $i++){ 
                    $image->withFile($img)->resize($width[$i], $height[$i])->save($path.'/'.$width[$i].'/'.$newName);
                }
                $this->Martikel->edit($this->request,$img);
                //hapus
                $filegam= str_replace($path.'/', "", $this->request->getpost('fotolama'));
                if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
                for ($i=0; $i < count($width); $i++) { 
                    if(file_exists($path.'/'.$width[$i].'/'.$filegam)){ unlink($path.'/'.$width[$i].'/'.$filegam); }
                }
                session()->setflashdata('msg','edit');
                return redirect()->to(base_url('paneladmin/artikel'));
            }
            else{
                $img= '';
                $this->Martikel->edit($this->request,$img);
                session()->setflashdata('msg','edit');
                return redirect()->to(base_url('paneladmin/artikel'));
            }
        }
        else{
            $img= '';
            $this->Martikel->edit($this->request,$img);
            session()->setflashdata('msg','edit');
            return redirect()->to(base_url('paneladmin/artikel'));
        }
    }
    public function hapus(){
        $path= 'file/artikel';
        $width= ['200', '500','900'];
        $height= ['150', '250','400'];
        $art= $this->Martikel->getone($this->uri->getsegment(3))->getrow();
        //hapus
        $filegam= str_replace($path.'/', "", $art->foto_artikel);
        if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
		for ($i=0; $i < count($width); $i++) { 
		    if(file_exists($path.'/'.$width[$i].'/'.$filegam)){ unlink($path.'/'.$width[$i].'/'.$filegam); }
		}
        $this->Martikel->hapus($this->uri->getsegment(3));
        session()->setflashdata('msg','hapus');
        echo 'oke';
    }
}
