<?php

namespace App\Controllers;

use App\Models\RequestsModel;

class Requests extends BaseController
{
    protected $requestsModel;

    public function __construct()
    {
        $this->requestsModel = new RequestsModel();
    }

    public function index()
    {
        if (!session()->get('num_user')) {
            return redirect()->to('/login');
        }

        $requests = $this->requestsModel->getRequestsWithTanaman();
        $data = [
            'title' => 'Tanamanku | Requests',
            'requests' => $requests,
        ];
        return view('/requests/index', $data);
    }

    public function delete($id)
    {
        if (!session()->get('num_user')) {
            return redirect()->to('/login');
        }

        session()->setFlashdata('message', 'Request oleh ' . $this->requestsModel->getRequestsWithTanaman($id)['nama_requester'] . ' berhasil dihapus!');
        $this->requestsModel->delete($id);
        return redirect()->to('/requests');
    }

    public function accept($id)
    {
        if (!session()->get('num_user')) {
            return redirect()->to('/login');
        }

        $this->requestsModel->update($id, ['status' => 'accepted']);
        session()->setFlashdata('message', 'Request oleh ' . $this->requestsModel->getRequestsWithTanaman($id)['nama_requester'] . ' berhasil diterima!');
        return redirect()->to('/requests');
    }

    public function reject($id)
    {
        if (!session()->get('num_user')) {
            return redirect()->to('/login');
        }

        $this->requestsModel->update($id, ['status' => 'rejected']);
        session()->setFlashdata('message', 'Request oleh ' . $this->requestsModel->getRequestsWithTanaman($id)['nama_requester'] . ' berhasil ditolak!');
        return redirect()->to('/requests');
    }

    

}
