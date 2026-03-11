<?php

class ZangeresController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('Zangeres');
    }

    public function index($display='none', $message='')
    {
        // Haal alle zangeressen op
        $result = $this->zangeresModel->getAllZangeressen();

        // Data voor de view
        $data = [
            'title' => 'Rijkste Zangeressen',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        // Laad de view
        $this->view('zangeres/index', $data);
    }
     public function delete($Id)
    {
        $result = $this->zangeresModel->delete($Id);

         header('Refresh:3 ; url='. URLROOT .'/zangeresController/index');

         $this->index('flex', 'Record is verwijderd');
    }


}