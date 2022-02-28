<?php

namespace App\Controllers;
use App\Models\TestModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\ParticipantModel;

class Auth extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        return view("operator/home");
    }

    public function login(){
        if ($this->request->getMethod() == "get"){
            return view("operator/login");
        }

        $username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
        $model = new ParticipantModel();
        
        $data = $model->where('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'isLoggedIn' => true
                ];
                $this->session->set($ses_data);
                return redirect()->to('/operator/home');
            
            }else{
                $this->session->setFlashdata('msg', 'username atau password salah');
                return redirect()->to('/operator/login');
            }
        }else{
            $this->session->setFlashdata('msg', 'username atau password salah');
            return redirect()->to('/operator/login');
        }

    }

}
