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

        $qualityCount = $this->plantsModel->getQualityCount();
        $requestsCount = $this->requestsModel->getStatusCount();

        $data = [
            'title' => 'Tanamanku | Dashboard',
            'qualityCount' => $qualityCount,
            'requestsCount' => $requestsCount,
        ];

        return view('/pages/dashboard', $data);
    }
}
