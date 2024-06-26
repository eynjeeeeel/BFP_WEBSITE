<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;

class LoginController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        return view('LOGIN/login');
    }

    public function processLogin()
    {
        helper(['form', 'url', 'session']);
    
        $rules = [
            'email' => 'required|valid_email|max_length[255]',
            'password' => 'required|min_length[8]|max_length[30]',
        ];
    
        $messages = [
            'email' => [
                'required' => 'Email is required.',
                'valid_email' => 'Invalid Email Address format.',
                'max_length' => 'Email should not exceed 255 characters.',
            ],
            'password' => [
                'required' => 'Password is required.',
                'min_length' => 'Password should be at least 8 characters.',
                'max_length' => 'Password should not exceed 30 characters.',
            ],
        ];
    
        if ($this->validate($rules, $messages)) {
            $accountModel = new AccountModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
    
            $data = $accountModel->where('email', $email)->first();
    
            if ($data) {
                $pass = $data['password'];
                $authenticatePassword = password_verify($password, $pass);
    
                if ($authenticatePassword) {
                    $ses_data = [
                        'user_id' => $data['user_id'],
                        'email' => $data['email'],
                        'isLoggedln' => TRUE
                    ];
    
                    $this->session->set($ses_data);
                    $this->session->setFlashdata('success', 'Login successful!');
                    return redirect()->to('/home');
                } else {
                    $this->session->setFlashdata('error', 'Password is incorrect.');
                    return redirect()->to('/login');
                }
            } else {
                $this->session->setFlashdata('error', 'Email does not exist.');
                return redirect()->to('/login');
            }
        } else {
            $data['validation'] = $this->validator;
            return view('LOGIN/login', $data);
        }
    }      
}
