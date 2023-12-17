<?php

namespace App\Models;

use CodeIgniter\Model;

class EditModel extends Model
{
  protected $table = 'edit';
  protected $useTimestamps = true;
  protected $allowedFields = ['tanamanId', 'adminId', 'createdAt'];

}