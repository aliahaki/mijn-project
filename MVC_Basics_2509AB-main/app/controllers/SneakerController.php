<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index()
    {
        // Haal alle sneakers op
        $result = $this->sneakerModel->getAllSneakers();

        // Data voor de view
        $data = [
            'title' => 'Overzicht Sneakers',
            'result' => $result
        ];

        // Laad de view
        $this->view('sneaker/index', $data);
    }
}