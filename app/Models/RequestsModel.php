<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestsModel extends Model
{
  protected $table = 'requests';
  protected $useTimestamps = false;
  protected $allowedFields = ['nama_requester', 'quantity', 'status', 'tanamanId', 'created_at'];

  public function getRequestsWithTanaman($id = false) // buat requests list page
  {
    $this->select('requests.*, tanaman.namaTanaman');

    if ($id == false) {
      return $this->join('tanaman', 'tanaman.id = requests.tanamanId')
        ->orderBy('requests.status', 'ASC')
        ->orderBy('requests.created_at', 'DESC')
        ->findAll();
    }

    return $this->where(['tanaman.id' => $id])
      ->join('tanaman', 'tanaman.id = requests.tanamanId')
      ->first();
  }

  public function getPendingRequests() // buat dashboard admin
  {
    return $this->where(['status' => 'pending'])->orderBy('createdAt', 'DESC')->findAll();
  }

  public function insertRequest($data)
  {
    return $this->insert($data);
  }

  public function getStatusCount()
  {
    $this->select('status, COUNT(status) as statusCount');
    $this->groupBy('status')->limit(3);
    return $this->findAll();
  }
}
