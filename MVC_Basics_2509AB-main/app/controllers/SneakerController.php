<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->sneakerModel->getAllSneakers();

        $data = [
            'title' => 'Overzicht Sneakers',
            'display' => $display,
            'message' => $message,
            'result'  =>  $result
        ];

        $this->view('sneaker/index', $data);
    }

    public function delete($id)
    {
        $this->sneakerModel->delete($id);

        header('Refresh:3; url=' . URLROOT . '/SneakerController/index');
        exit;
    }

    /* ---------------------------------------------------------
       CREATE – met rode validatie
       --------------------------------------------------------- */
    public function create()
    {
        $data = [
            'title'   => 'Nieuwe sneaker toevoegen',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // MERK
            if (empty(trim($_POST['merk']))) {
                $data['errors']['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 20) {
                $data['errors']['merk'] = 'Merk mag maximaal 20 tekens bevatten';
            }

            // MODEL
            if (empty(trim($_POST['model']))) {
                $data['errors']['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 20) {
                $data['errors']['model'] = 'Model mag maximaal 20 tekens bevatten';
            }

            // TYPE
            if (empty(trim($_POST['type']))) {
                $data['errors']['type'] = 'Voer een type in';
            }

            // PRIJS
            if (empty($_POST['prijs'])) {
                $data['errors']['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999) {
                $data['errors']['prijs'] = 'Prijs moet tussen 0 en 9999 liggen';
            }

            // MATERIAAL
            if (empty(trim($_POST['materiaal']))) {
                $data['errors']['materiaal'] = 'Voer een materiaal in';
            }

            // GEWICHT
            if (empty($_POST['gewicht'])) {
                $data['errors']['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] < 0 || $_POST['gewicht'] > 10) {
                $data['errors']['gewicht'] = 'Gewicht moet tussen 0 en 10 kg liggen';
            }

            // RELEASEDATUM
            if (empty($_POST['releasedatum'])) {
                $data['errors']['releasedatum'] = 'Voer een releasedatum in';
            }

            // OPSLAAN ALS GEEN FOUTEN
            if (empty($data['errors'])) {

                $this->sneakerModel->create($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                header('Refresh: 3; URL=' . URLROOT . '/SneakerController/index');
                exit;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden correct in';
            }
        }

        $this->view('sneaker/create', $data);
    }

    /* ---------------------------------------------------------
       UPDATE – met rode validatie
       --------------------------------------------------------- */
    public function update($Id = NULL)
    {
        $data = [
            'title'   => 'Wijzig sneaker',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // MERK
            if (empty(trim($_POST['merk']))) {
                $data['errors']['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 20) {
                $data['errors']['merk'] = 'Merk mag maximaal 20 tekens bevatten';
            }

            // MODEL
            if (empty(trim($_POST['model']))) {
                $data['errors']['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 20) {
                $data['errors']['model'] = 'Model mag maximaal 20 tekens bevatten';
            }

            // TYPE
            if (empty(trim($_POST['type']))) {
                $data['errors']['type'] = 'Voer een type in';
            }

            // PRIJS
            if (empty($_POST['prijs'])) {
                $data['errors']['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999) {
                $data['errors']['prijs'] = 'Prijs moet tussen 0 en 9999 liggen';
            }

            // MATERIAAL
            if (empty(trim($_POST['materiaal']))) {
                $data['errors']['materiaal'] = 'Voer een materiaal in';
            }

            // GEWICHT
            if (empty($_POST['gewicht'])) {
                $data['errors']['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] < 0 || $_POST['gewicht'] > 10) {
                $data['errors']['gewicht'] = 'Gewicht moet tussen 0 en 10 kg liggen';
            }

            // RELEASEDATUM
            if (empty($_POST['releasedatum'])) {
                $data['errors']['releasedatum'] = 'Voer een releasedatum in';
            }

            // OPSLAAN ALS GEEN FOUTEN
            if (empty($data['errors'])) {

                $this->sneakerModel->updateSneaker($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';

                header('Refresh: 3; URL=' . URLROOT . '/SneakerController/index');
                exit;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden correct in';
            }
        }

        $data['sneaker'] = $this->sneakerModel->getSneakerById($Id);

        $this->view('sneaker/update', $data);
    }
}
