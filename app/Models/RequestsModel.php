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
      return $this->join('tanaman', 'tanaman.id = requests.tanamanId')->orderBy('requests.status', 'ASC')->orderBy('requests.created_at', 'DESC')->findAll();
    }

    return $this->join('tanaman', 'tanaman.id = requests.tanamanId')->find($id);
  }

  public function getPendingRequests() // buat dashboard admin
  {
    $result = $this->select('requests.*, tanaman.namaTanaman as namaTanaman, tanaman.image as gambarTanaman')
      ->join('tanaman', 'tanaman.id = requests.tanamanId')
      ->where(['status' => 'pending'])
      ->orderBy('requests.created_at', 'DESC')
      ->limit(3)
      ->findAll();
      
    return $result;
  }

  public function insertRequest($data)
  {
    return $this->insert($data);
  }

  public function getStatusCount()
  {
    $this->select('status, COUNT(status) as statusCount');
    $this->groupBy('status');
    return $this->findAll();
  }
}
