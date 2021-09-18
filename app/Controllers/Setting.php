<?php

namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\Mlogin;
use App\Models\Maplikasi;
class Setting extends BaseController
{
    public function __construct(){
        $this->request= \Config\services::request();
        $this->uri= new \CodeIgniter\HTTP\URI(uri_string());
        $this->Maplikasi= new Maplikasi();
        $this->Mlogin= new Mlogin();
    }
    public function ubahpassword(){
		if($this->request->getpost('passbaru')!=null){
			if(md5($this->request->getpost('passbaru'))==md5($this->request->getpost('konfpassbaru'))){
				$this->Mlogin->ubahpasswordadmin($this->request,session()->get('id_pengguna'));
				echo "1";
			}
			else{
				echo "2";
			}
		}
		else{
			echo "3";
		}
	}
	public function ubahprofil(){
        $path= 'file/avatar';
        $width= ['100'];
        $height= ['100'];
        $image = \Config\Services::image();
        $file = $this->request->getFile('foto_pengguna');
        if($file->getName()!=null){
            $validated= $this->validate([
               'foto_pengguna' => 'uploaded[foto_pengguna]|max_size[foto_pengguna,5000]|mime_in[foto_pengguna,image/png,image/jpg,image/gif,image/jpeg]'
            ]);
            if($validated){
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $img= $path.'/'.$newName;
                for ($i=0; $i < count($width); $i++){ 
                    $image->withFile($img)->resize($width[$i], $height[$i])->save($path.'/'.$width[$i].'_'.$newName);
                }
                $this->Mlogin->ubahprofiladmin($this->request,session()->get('id_pengguna'),$img);
                //hapus
                $filegam= str_replace($path.'/', "", $this->request->getpost('fotolama'));
                if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
                for ($i=0; $i < count($width); $i++) { 
                    if(file_exists($path.'/'.$width[$i].'_'.$filegam)){ unlink($path.'/'.$width[$i].'_'.$filegam); }
                }
                echo 'oke';
            }
            else{
                $img= '';
                $this->Mlogin->ubahprofiladmin($this->request,session()->get('id_pengguna'),$img);
                echo 'oke';
            }
        }
        else{
            $img= '';
            $this->Mlogin->ubahprofiladmin($this->request,session()->get('id_pengguna'),$img);
            echo 'oke';
        }
    }
    public function simpan(){
        $path= 'file/logo';
        $image = \Config\Services::image();
        //icon
        $file = $this->request->getFile('icon_app');
        if($file->getName()!=null){
            $validated= $this->validate([
               'icon_app' => 'uploaded[icon_app]|max_size[icon_app,5000]|mime_in[icon_app,image/png,image/jpg,image/gif,image/jpeg]'
            ]);
            if($validated){
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $img= $path.'/'.$newName;
                //hapus
                $filegam= str_replace($path.'/', "", $this->request->getpost('iconlama'));
                if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
                $fileicon= $img;
            }
            else{
                $fileicon= 'kosong';
            }
        }
        else{
            $fileicon= 'kosong';
        }

        //logo
        $file = $this->request->getFile('logo_app');
        if($file->getName()!=null){
            $validated= $this->validate([
               'logo_app' => 'uploaded[logo_app]|max_size[logo_app,5000]|mime_in[logo_app,image/png,image/jpg,image/gif,image/jpeg]'
            ]);
            if($validated){
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $img= $path.'/'.$newName;
                //hapus
                $filegam= str_replace($path.'/', "", $this->request->getpost('logolama'));
                if(file_exists($path.'/'.$filegam)){ unlink($path.'/'.$filegam); }
                $filelogo= $img;
            }
            else{
                $filelogo= 'kosong';
            }
        }
        else{
            $filelogo= 'kosong';
        }
        $this->Maplikasi->simpan($this->request,$fileicon,$filelogo);
        session()->setflashdata('msg','edit');
        return redirect()->to(base_url('paneladmin/setting'));
    }
    public function sendemail(){
        $app= $this->Maplikasi->data()->getrow();
        $email= $this->request->getpost('emailtujuan');
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host     = $app->smtphost_app;
            $mail->SMTPAuth = true;
            $mail->Username = $app->smtpuser_app;
            $mail->Password = $app->smtppass_app;
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = $app->smtpport_app;
            $mail->setFrom($app->alamatemail_app, $app->atasnamaemail_app);
            $mail->addReplyTo($app->alamatemail_app, $app->atasnamaemail_app);
            $mail->addAddress($email,'Receive Email');
            $mail->Subject = 'Testing Email Aplikasi';
            $mail->isHTML(true);
            //include APPPATH.'views/template/email/default.php';
            $mailContent = $this->request->getpost('pesan');
            $mail->Body = $mailContent;
            // Send email
            $mail->send();
            echo 'Email Berhasil Terkirim. Cek Inbox atau Spam';
        } catch (Exception $e) {
            echo 'GAGAL MENGIRIM EMAIL!';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
    public function pesankontak(){
        $app= $this->Maplikasi->data()->getrow();
        $email= $app->email_app;
        $nama= $this->request->getpost('name');
        $dari= $this->request->getpost('email');
        $phone= $this->request->getpost('phone');
        $subject= $this->request->getpost('subject');
        $pesan= $this->request->getpost('textarea');
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host     = $app->smtphost_app;
            $mail->SMTPAuth = true;
            $mail->Username = $app->smtpuser_app;
            $mail->Password = $app->smtppass_app;
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = $app->smtpport_app;
            $mail->setFrom($dari, $nama);
            $mail->addReplyTo($dari, $nama);
            $mail->addAddress($email,$app->nama_app);
            $mail->Subject = strtoupper($subject);
            $mail->isHTML(true);
            //include APPPATH.'views/template/email/default.php';
            $mailContent= $pesan.'<br><br>No HP : '.$phone;
            $mail->Body = $mailContent;
            // Send email
            $mail->send();
            session()->setflashdata('msg','berhasil');
            return redirect()->to(base_url('kontak'));

        } catch (Exception $e) {
            session()->setflashdata('msg','gagal');
            return redirect()->to(base_url('kontak'));
        }
    }
}
