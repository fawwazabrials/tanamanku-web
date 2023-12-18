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

        $curlOptions = [
            'baseURI' => getenv('GREENBOX_API_URL'),
            'timeout' => 5,
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json', // Set the content type to JSON
            ],
        ];
        $client = \Config\Services::curlrequest($curlOptions);

        $response = $client->request('PUT', '/api/product/add-stock', [
            'body' => json_encode([
                'nama' => $this->requestsModel->getRequestsWithTanaman($id)['namaTanaman'],
                'tambahan' => $this->requestsModel->getRequestsWithTanaman($id)['quantity'],
                'email' => getenv('GREENBOX_API_SECRET_EMAIL'),
                'password' => getenv('GREENBOX_API_SECRET_PASSWORD'),
            ]),
        ]);

        $dataResponse = json_decode($response->getBody(), true);

        if ($dataResponse['status'] == 'error') {
            session()->setFlashdata('message', 'Request oleh ' . $this->requestsModel->getRequestsWithTanaman($id)['nama_requester'] . ' gagal diterima! ' . $dataResponse['message']);
            return redirect()->to('/requests');
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
