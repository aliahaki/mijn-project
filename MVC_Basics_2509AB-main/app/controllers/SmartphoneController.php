<?php

class SmartphoneController extends BaseController
{
    private $smartphoneModel;

    public function __construct()
    {
        $this->smartphoneModel = $this->model('Smartphone');
    }

    public function index($display='none', $message='')
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->smartphoneModel->getAllSmartphones();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title' => 'Overzicht Smartphones',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view 
         * aangeroepen
         */
        $this->view('smartphone/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->smartphoneModel->delete($Id);

        header('Location: ' . URLROOT . '/SmartphoneController/index');
        exit;

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe smartphone toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['geheugen']) ||
                empty($_POST['besturingssysteem']) ||
                empty($_POST['schermgrootte']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['megapixels'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            }
            else {

                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->smartphoneModel->create($_POST);

                header('Location: ' . URLROOT . '/SmartphoneController/index');
                exit;
            }
        }

        $this->view('smartphone/create', $data);
    }

    public function update($Id=NULL)
    {
        $data = [
            'title'   => 'Wijzig smartphone',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['geheugen']) ||
                empty($_POST['besturingssysteem']) ||
                empty($_POST['schermgrootte']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['megapixels'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
                $data['color'] = 'danger';
            }
            else {
                $result = $this->smartphoneModel->updateSmartphone($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header('Refresh: 3; URL=' . URLROOT . '/SmartphoneController/index');
            }
        }

        // Laat de model de data ophalen uit de database
        $data['smartphone'] = $this->smartphoneModel->getSmartphoneById($Id);

        $this->view('smartphone/update', $data);
    }
}