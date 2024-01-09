<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;

class LoginController extends BaseController
{
    public function login()
    {
        return view('LOGIN/login');
    }
    public function processLogin()
    {
        $session = session();
        $accountModel = new AccountModel();
        $email = $this->request->getvar('email');
        $password = $this->request->getVar('password');
        
        $data = $accountModel->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) 
            {
                $ses_data = [
                    'id' => $data['id'],
                    'email' => $data['email'],
                    'isLoggedln' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/home');
                    }
            else
            {
                $session->setFlashdata('msg','Password is incorrect.');
                return redirect()->to('LOGIN/login');
            }
        } else{
        $session->setFlashdata('msg', 'Email does not exist.');
        return redirect()->to('LOGIN/login');
        }
    }
}
