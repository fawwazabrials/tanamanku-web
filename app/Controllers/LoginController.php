<?php

namespace App\Controllers;

use App\Models\Login;

class LoginController extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Tanamanku | Login',
    ];
    
    return view('login', $data);
  }
  public function login_action()
  {
    $model = model(Login::class);
    $email = $this->request->getPost('email');

    // Get the password as a string
    $password = (string) $this->request->getPost('password');
    if (is_string($password)) {
      $password = md5($password);
    } else {
      // Handle the case where the password is not a string (optional)
      return redirect()->to('/login');
    }

    if ($email == '' || $password == '') {
      return redirect()->to('/login');
    } 

    $cek = $model->getDataUsers($email, $password);

    if ($cek == 1) {
      session()->set('num_user', $cek);
      session()->set('adminId', $model->getAdminId($email, $password));
      return redirect()->to('/');
    } else {
      session()->setFlashdata('error', 'Email atau Password salah');
      return redirect()->to('/login')->withInput();
    }
  }
  public function logout()
  {
    session()->destroy();
    return redirect()->to('/login');
  }
}
