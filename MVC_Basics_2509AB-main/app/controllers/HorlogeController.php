<?php

class HorlogeController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index()
    {
        // Haal alle horloges op
        $result = $this->horlogeModel->getAllHorloges();

        // Data voor de view
        $data = [
            'title' => 'Duurste Horloges',
            'result' => $result
        ];

        // Laad de view
        $this->view('horloge/index', $data);
    }
}