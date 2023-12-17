<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

use App\Models\PlantsModel;
use App\Models\RequestsModel;
use App\Models\TanamankuAuth;
use CodeIgniter\I18n\Time;

class TanamankuAPI extends ResourceController
{
  public function plants($seg1 = null, $seg2 = null)
  {
    $model = model(TanamankuAuth::class);
    $email = $seg1;
    $pass = $seg2;
    $cek = $model->getDataAuthentication($email, $pass);
    if ($cek == 1) {
      $model = new PlantsModel();
      $data = [
        'message' => 'success',
        'plants' => $model->getPlants(),
      ];
      return $this->respond($data, 200);
    } else {
      return ("Authentication Failed");
    }
  }

  public function plant($id = null, $seg1 = null, $seg2 = null)
  {
    $model = model(TanamankuAuth::class);
    $email = $seg1;
    $pass = $seg2;
    $cek = $model->getDataAuthentication($email, $pass);
    if ($cek == 1) {
      $model = new PlantsModel();
      $data = [
        'message' => 'success',
        'plants' => $model->getPlants($id),
      ];
      return $this->respond($data, 200);
    } else {
      return ("Authentication Failed");
    }
  }

  public function postRequests($seg1 = null, $seg2 = null)
  {
    $model = model(TanamankuAuth::class);
    $email = $seg1;
    $pass = $seg2;
    $cek = $model->getDataAuthentication($email, $pass);

    if ($cek == 1) {
      $model = new RequestsModel();

      // Get the request body data
      $data = $this->request->getJSON();

      // Validate required parameters
      if (
        !property_exists($data, 'nama_requester')
        || !property_exists($data, 'quantity')
        || !property_exists($data, 'tanamanId')
      ) {
        return $this->fail("Missing required parameters. 'nama_requester', 'quantity', and 'tanamanId' are required.");
      }

      // Validate tanamanId
      $tanamanModel = new PlantsModel();
      $tanaman = $tanamanModel->find($data->tanamanId);
      if (!$tanaman) {
        return $this->fail("Invalid tanamanId. Tanaman not found.");
      }

      // Validate quantity as an integer and greater than 0
      if (!filter_var($data->quantity, FILTER_VALIDATE_INT) || $data->quantity <= 0) {
        return $this->fail("Quantity must be a valid integer greater than 0.");
      }

      // Validate nama_requester as a non-empty string
      if (!is_string($data->nama_requester) || empty(trim($data->nama_requester))) {
        return $this->fail("Nama requester must be a non-empty string.");
      }

      // Insert data into the database
      $model->insertRequest([
        'nama_requester' => $data->nama_requester,
        'quantity' => $data->quantity,
        'status' => 'pending',
        'tanamanId' => $data->tanamanId,
        'created_at' => Time::now('Asia/Jakarta', 'en_US'),
      ]);

      $response = [
        'message' => 'success',
        'data' => $data,
      ];

      return $this->respondCreated($response);
    } else {
      return $this->failUnauthorized("Authentication Failed");
    }
  }
}
