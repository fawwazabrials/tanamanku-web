<?php

namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{
  public function getDataUsers($email, $password)
  {

    $result = $this->db->table('admin')->select('namaAdmin')
      ->where(array('email' => $email, 'password' => $password))
      ->get()->getRowArray();

    // Check if $result is not null before using count()
    if ($result !== null) {
      return count($result);
    } else {
      return 0;
    }
  }

  public function getAdminId($email, $password)
  {
    $result = $this->db->table('admin')->select('id')
      ->where(array('email' => $email, 'password' => $password))
      ->get()->getRowArray();

    // Check if $result is not null before using count()
    if ($result !== null && count($result) == 1) {
      return $result['id'];
    } else {
      return 0;
    }
  }
}
