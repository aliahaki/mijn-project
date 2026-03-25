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


public function create()
{
    $data = [
        'title'   => 'Nieuwe horloge toevoegen',
        'display' => 'none',
        'message' => ''
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST['merk']) ||
            empty($_POST['model']) ||
            empty($_POST['prijs']) ||
            empty($_POST['materiaal']) ||
            empty($_POST['gewicht']) ||
            empty($_POST['releasedatum']) ||
            empty($_POST['waterdichtheid']) ||
            empty($_POST['type']) ||
            empty($_POST['uniekkenmerk'])) {

            $data['display'] = 'flex';
            $data['message'] = 'Vul alle velden in';
        } else {

            $data['display'] = 'flex';
            $data['message'] = 'De gegevens zijn opgeslagen';

            $this->horlogeModel->create($_POST);

            header('Refresh: 3; URL=' . URLROOT . '/HorlogeController/index');
            exit;
        }
    }

    $this->view('horloge/create', $data);
}

 public function update($Id=NULL)
 {
        $data = [
            'title'   => 'Wijzig horloge',
            'display' => 'none',
            'message' => ''
        ];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //  var_dump($_POST);
        
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['waterdichtheid']) ||
                empty($_POST['type']) ||
                empty($_POST['uniekkenmerk'])) {

                 $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
                $data['color'] = 'danger';
            } else {
                $result = $this->horlogeModel->updateHorloge($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header('Refresh: 3; URL=' . URLROOT . '/HorlogeController/index');
            }
        }

    // Laat de model de data ophalen uit de database
    $data['horloge'] = $this->horlogeModel->getHorlogeById($Id);

    $this->view('horloge/update', $data);
 }
}