<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class ALoginController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function adminlogin()
    {
        return view('ALOGIN/adminlogin');
    }

    public function adminprocessLogin()
    {
        helper(['form', 'url', 'session']);
    
        $rules = [
            'email_address' => 'required|valid_email|max_length[100]',
            'password' => 'required|min_length[8]|max_length[255]',
        ];
    
        $messages = [
            'email_address' => [
                'required' => 'Email is required.',
                'valid_email' => 'Invalid Email Address format.',
                'max_length' => 'Email should not exceed 100 characters.',
            ],
            'password' => [
                'required' => 'Password is required.',
                'min_length' => 'Password should be at least 8 characters.',
                'max_length' => 'Password should not exceed 255 characters.',
            ],
        ];
    
        if ($this->validate($rules, $messages)) {
            $adminModel = new AdminModel();
            $email = $this->request->getVar('email_address');
            $password = $this->request->getVar('password');
    
            $admin = $adminModel->where('email_address', $email)->first();
    
            if ($admin) {
                $hashedPassword = $admin['password'];

                if (password_verify($password, $hashedPassword)) {
                    $sessionData = [
                        'admin_id' => $admin['admin_id'],
                        'email_address' => $admin['email_address'],
                        'isLoggedln' => true
                    ];
    
                    $this->session->set($sessionData);
                    $this->session->setFlashdata('success', 'Login successful!');
                    return redirect()->to('/admin-home');
                } else {
                    $this->session->setFlashdata('error', 'Password is incorrect.');
                    return redirect()->to('/admin-login');
                }
            } else {
                $this->session->setFlashdata('error', 'Email does not exist.');
                return redirect()->to('/admin-login');
            }
        } else {
            $data['validation'] = $this->validator;
            return view('ALOGIN/adminlogin', $data);
        }
    }
}
