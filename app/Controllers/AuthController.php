<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// Models
use App\Models\UserModel;

class AuthController extends BaseController
{
    private $validation;

    public function __construct() {
        $this->validation = \Config\Services::validation();
    }

    public function login() {
        $userdata = [
            'userID' => $this->request->getPost('userID'),
            'password' => $this->request->getPost('password'),
        ];

        // validate user data
        
        $this->validation->setRules([
            'userID' => 'required|trim|min_length[5]|max_length[20]|string',
            'password' => 'required|min_length[8]|max_length[20]|string',
        ]);
        if (!$this->validation->withRequest($this->request)->run()) {
            $field = "";
            $message = "";
            if ($this->validation->hasError('userID')) {
                $field = "userID";
                $message = "아이디는 5~20자 내로 입력해주세요";
            } else {
                $field = "password";
                $message = "비밀번호는 8~20자 그리고 영문, 숫자, 특수문자로 입력해주세요.";
            }
            
            return $this->response->setJSON([
                'status' => true,
                'type' => 'validation',
                'field' => $field,
                'message' => $message
            ]);
        } else {
            $UserModel = new UserModel();
            $user = $UserModel->where('user_id', $userdata['userID'])->first();

            if($user) {
                $authenticatePassword = password_verify($userdata['password'], $user['PASSWORD']);

                if($authenticatePassword){
                    $session = session();
                    $ses_data = [
                        'username' => $user['USER_NAME'],
                        'isLoggedIn' => true
                    ];
                    $session->set($ses_data);
                    // return redirect()->to('/profile');
                    return $this->response->setJSON([
                        'status' => false,
                        'type' => 'login',
                        'msg' => 'Successfully logged in'
                    ]);
                }
            }

            return $this->response->setJSON([
                'status' => true,
                'type' => 'login',
                'msg' => '아이디가 없거나 잘못된 비밀번호입니다.'
            ]);
        }
    }

    public function register()
    {
        // request data
        $userdata = [
            'user_id' => $this->request->getPost('userID'),
            'user_name' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'chk_password' => $this->request->getPost('chk_password'),
            'email' => $this->request->getPost('email'),
        ];

        // validate user data
        $this->validation->setRules([
            'userID' => 'required|trim|min_length[5]|max_length[20]|string',
            'username' => 'required|trim|min_length[3]|max_length[20]|string',
            'password' => 'required|min_length[8]|max_length[20]|string',
            'chk_password' => 'matches[password]',
            'email' => 'required|valid_email',
        ]);
        if (!$this->validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => false,
                'message' => "validation fail"
            ]);
        } else if($userdata['password'] != $userdata['chk_password']) {
            return $this->response->setJSON([
                'status' => false,
                'message' => "비밀번호가 맞지 않습니다"
            ]);
        } else {
            $UserModel = new UserModel();

            $saveSuccess = false;
            $message = "";

            try {
                $userdata['password'] =  password_hash($userdata['password'], PASSWORD_DEFAULT);

                $UserModel->save($userdata);
                $saveSuccess = true;
            } catch (Exception $e) {
                echo $e;
            }

            return $this->response->setJSON([
                'status' => $saveSuccess,
                'message' => $message
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'isDuplicate' => true,
            'msg' => '아이디가 없거나 잘못된 비밀번호입니다.'
        ]);
    }
}
