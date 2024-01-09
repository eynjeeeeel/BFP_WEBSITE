<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;

class RegistrationController extends BaseController
{

    public function register()
    {
        return view('REGISTER/registration_form');
    }

    public function processForm()
    {
        helper(['form']);

        $rules = [
            'fullName' => 'required|max_length[255]',
            'dob' => 'required|valid_date',
            'address' => 'required',
            'phoneNumber' => 'required|max_length[20]',
            'email' => 'required|valid_email|max_length[255]',
            'password' => 'required|min_length[8]|max_length[30]',
            'sex' => 'required|in_list[male,female]',
            'photoId' => 'uploaded[photoId]|max_size[photoId,1024]|is_image[photoId]|mime_in[photoId,image/jpeg,image/png,image/gif]',
            'profilePhoto' => 'uploaded[profilePhoto]|max_size[profilePhoto,1024]|is_image[profilePhoto]|mime_in[profilePhoto,image/jpeg,image/png,image/gif]',
            'permission' => 'required',
        ];

        $messages = [
            'fullName' => [
                'required' => 'Full Name is required.',
                'max_length' => 'Full Name should not exceed 255 characters.',
            ],
            'dob' => [
                'required' => 'Date of Birth is required.',
                'valid_date' => 'Invalid Date of Birth format.',
            ],
            'address' => [
                'required' => 'Home Address is required.',
            ],
            'phoneNumber' => [
                'required' => 'Phone Number is required.',
                'max_length' => 'Phone Number should not exceed 20 characters.',
            ],
            'email' => [
                'required' => 'Email Address is required.',
                'valid_email' => 'Invalid Email Address format.',
                'max_length' => 'Email Address should not exceed 255 characters.',
            ],
            'password' => [
                'required' => 'Password is required.',
                'min_length' => 'Password should be at least 8 characters.',
                'max_length' => 'Password should not exceed 30 characters.',
            ],
            'sex' => [
                'required' => 'Sex is required.',
                'in_list' => 'Invalid value for Sex.',
            ],
            'photoId' => [
                'uploaded' => 'Photo ID is required.',
                'max_size' => 'Photo ID size should not exceed 1MB.',
                'is_image' => 'Invalid format for Photo ID.',
                'mime_in' => 'Invalid file type for Photo ID.',
            ],
            'profilePhoto' => [
                'uploaded' => 'Profile Photo is required.',
                'max_size' => 'Profile Photo size should not exceed 1MB.',
                'is_image' => 'Invalid format for Profile Photo.',
                'mime_in' => 'Invalid file type for Profile Photo.',
            ],
            'permission' => [
                'required' => 'Permission agreement is required.',
            ],
        ];

        if ($this->validate($rules, $messages)) {
            $accountModel = new AccountModel();
            $data = [
                'fullName' => $this->request->getVar('fullName'),
                'dob' => $this->request->getVar('dob'),
                'address' => $this->request->getVar('address'),
                'phoneNumber' => $this->request->getVar('phoneNumber'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'sex' => $this->request->getVar('sex'),
                'photoId' => $this->request->getVar('photoId'),
                'profilePhoto' => $this->request->getVar('profilePhoto'),
                'permission' => $this->request->getVar('permission'),
            ];

            $accountModel->insert($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('REGISTER/registration_form', $data);
        }
    }
}
