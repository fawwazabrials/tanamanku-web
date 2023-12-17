<?php

namespace App\Models;

use CodeIgniter\Model;

class EditModel extends Model
{
  protected $table = 'edit';
  protected $useTimestamps = false;
  protected $allowedFields = ['tanamanId', 'adminId', 'createdAt'];

  public function getEdit($id = false)
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id' => $id])->first();
  }
}