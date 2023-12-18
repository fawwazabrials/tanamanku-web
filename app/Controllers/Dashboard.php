<?php

namespace App\Controllers;

use App\Models\PlantsModel;
use App\Models\RequestsModel;

class Dashboard extends BaseController
{
    protected $plantsModel;
    protected $requestsModel;

    public function __construct()
    {
        $this->plantsModel = new PlantsModel();
        $this->requestsModel = new RequestsModel();
    }

    public function index()
    {
        if (!session()->get('num_user')) {
            return redirect()->to('/login');
        }

        // GET DATA FROM GREENBOX API
        $dataOrders = [];

        $curlOptions = [
            'baseURI' => getenv('GREENBOX_API_URL'),
            'timeout' => 5,
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
            ]
        ];
        $client = \Config\Services::curlrequest($curlOptions);

        $response = $client->request('GET', '/api/order/report?email=' . getenv('GREENBOX_API_SECRET_EMAIL') . '&password=' . getenv('GREENBOX_API_SECRET_PASSWORD'));
        $dataResponse = json_decode($response->getBody(), true);
        $dataOrders = $dataResponse['data'];
        usort($dataOrders, function ($a, $b) {
            return $b['amount'] <=> $a['amount'];
        });
        $dataOrders = array_slice($dataOrders, 0, 3);

        foreach ($dataOrders as $key => $value) {
            $dataOrders[$key]['image'] = $this->plantsModel->where(['namaTanaman' => $value['name']])->first()['image'];
        }

        $qualityCount = $this->plantsModel->getQualityCount();
        $requestsCount = $this->requestsModel->getStatusCount();
        $newestPendingRequests = $this->requestsModel->getPendingRequests();

        $data = [
            'title' => 'Tanamanku | Dashboard',
            'qualityCount' => $qualityCount,
            'requestsCount' => $requestsCount,
            'newestPendingRequests' => $newestPendingRequests,
            'dataOrders' => $dataOrders ?: [],
        ];

        

        return view('/pages/dashboard', $data);
    }
}
