<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantsModel extends Model
{
  protected $table = 'tanaman';
  protected $useTimestamps = false;
  protected $allowedFields = ['namaTanaman', 'deskripsi', 'soil_moisture', 'temperature', 'humidity', 'ph_level', 'last_reading', 'image', 'quality'];

  public function getPlants($id = false)
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id' => $id])->first(); 
  }

  public function getPlantsWithEditAndAdmin($id = false)
  {
    $this->select('tanaman.*, edit.tanamanId, edit.adminId, edit.createdAt as editCreatedAt, admin.namaAdmin as adminNama');

    if ($id == false) {
      return $this->join('edit', 'edit.tanamanId = tanaman.id')
      ->join('admin', 'admin.id = edit.adminId')
      ->orderBy('edit.createdAt', 'DESC')
      ->limit(3)
      ->get()
      ->getResult();
    }

    return $this->join('edit', 'edit.tanamanId = tanaman.id')
      ->join('admin', 'admin.id = edit.adminId')
      ->where(['tanaman.id' => $id])
      ->orderBy('edit.createdAt', 'DESC')
      ->limit(3)
      ->get()
      ->getResult();
  }

  public function getQualityCount()
  {
    $this->select('quality, COUNT(quality) as qualityCount');
    $this->groupBy('quality');
    return $this->findAll();
  }
}
