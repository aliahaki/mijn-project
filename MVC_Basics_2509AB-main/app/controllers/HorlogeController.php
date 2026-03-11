<?php

class HorlogeController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index($display='none', $message='')
    {
        // Haal alle horloges op
        $result = $this->horlogeModel->getAllHorloges();

        // Data voor de view
        $data = [
            'title' => 'Duurste Horloges',
            'display'=>$display,
            'message'=>$message,
            'result' => $result
        ];

        // Laad de view
        $this->view('horloge/index', $data);
    }

     public function delete($Id)
    {
        $result = $this->horlogeModel->delete($Id);

         header('Refresh:3 ; url='. URLROOT .'/horlogeController/index');

         $this->index('flex', 'Record is verwijderd');
    }
}