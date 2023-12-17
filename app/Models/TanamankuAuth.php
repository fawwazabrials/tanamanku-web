<?php 

namespace App\Models;

use CodeIgniter\Model;

class TanamankuAuth extends Model
{
  function getDataAuthentication($email, $pass) {
    $pass = md5($pass);
    $query = $this->db->query("SELECT namaAdmin FROM admin WHERE email = '$email' AND password = '$pass'");
    
    $result = $query->getResult();

    return count($result);
  }
}

?>