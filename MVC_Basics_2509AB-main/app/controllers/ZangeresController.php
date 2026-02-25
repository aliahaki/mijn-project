<?php

class ZangeresController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('Zangeres');
    }

    public function index()
    {
        // Haal alle zangeressen op
        $result = $this->zangeresModel->getAllZangeressen();

        // Data voor de view
        $data = [
            'title' => 'Rijkste Zangeressen',
            'result' => $result
        ];

        // Laad de view
        $this->view('zangeres/index', $data);
    }
}