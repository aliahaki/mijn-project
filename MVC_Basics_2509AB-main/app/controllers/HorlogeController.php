<?php

class HorlogeController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->horlogeModel->getAllHorloges();

        $data = [
            'title' => 'Duurste Horloges',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('horloge/index', $data);
    }

    public function delete($Id)
    {
        $this->horlogeModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/HorlogeController/index');
        exit;
    }

    /* ---------------------------------------------------------
       CREATE – met rode validatie + max 20 tekens
       --------------------------------------------------------- */
    public function create()
    {
        $data = [
            'title'   => 'Nieuwe horloge toevoegen',
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

            // PRIJS
            if (empty($_POST['prijs'])) {
                $data['errors']['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 99999) {
                $data['errors']['prijs'] = 'Prijs moet tussen 0 en 99999 liggen';
            }

            // MATERIAAL
            if (empty(trim($_POST['materiaal']))) {
                $data['errors']['materiaal'] = 'Voer een materiaal in';
            }

            // GEWICHT
            if (empty($_POST['gewicht'])) {
                $data['errors']['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] < 0 || $_POST['gewicht'] > 5) {
                $data['errors']['gewicht'] = 'Gewicht moet tussen 0 en 5 kg liggen';
            }

            // RELEASEDATUM
            if (empty($_POST['releasedatum'])) {
                $data['errors']['releasedatum'] = 'Voer een releasedatum in';
            }

            // WATERDICHTHEID
            if (empty($_POST['waterdichtheid'])) {
                $data['errors']['waterdichtheid'] = 'Voer een waterdichtheid in';
            } elseif (!is_numeric($_POST['waterdichtheid']) || $_POST['waterdichtheid'] < 0 || $_POST['waterdichtheid'] > 1000) {
                $data['errors']['waterdichtheid'] = 'Waterdichtheid moet tussen 0 en 1000 meter liggen';
            }

            // TYPE
            if (empty(trim($_POST['type']))) {
                $data['errors']['type'] = 'Voer een type in';
            }

            // UNIEK KENMERK
            if (empty(trim($_POST['uniekkenmerk']))) {
                $data['errors']['uniekkenmerk'] = 'Voer een uniek kenmerk in';
            }

            // OPSLAAN ALS GEEN FOUTEN
            if (empty($data['errors'])) {

                $this->horlogeModel->create($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                header('Refresh: 3; URL=' . URLROOT . '/HorlogeController/index');
                exit;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden correct in';
            }
        }

        $this->view('horloge/create', $data);
    }

    /* ---------------------------------------------------------
       UPDATE – met rode validatie + max 20 tekens
       --------------------------------------------------------- */
    public function update($Id = NULL)
    {
        $data = [
            'title'   => 'Wijzig horloge',
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

            // PRIJS
            if (empty($_POST['prijs'])) {
                $data['errors']['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 99999) {
                $data['errors']['prijs'] = 'Prijs moet tussen 0 en 99999 liggen';
            }

            // MATERIAAL
            if (empty(trim($_POST['materiaal']))) {
                $data['errors']['materiaal'] = 'Voer een materiaal in';
            }

            // GEWICHT
            if (empty($_POST['gewicht'])) {
                $data['errors']['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] < 0 || $_POST['gewicht'] > 5) {
                $data['errors']['gewicht'] = 'Gewicht moet tussen 0 en 5 kg liggen';
            }

            // RELEASEDATUM
            if (empty($_POST['releasedatum'])) {
                $data['errors']['releasedatum'] = 'Voer een releasedatum in';
            }

            // WATERDICHTHEID
            if (empty($_POST['waterdichtheid'])) {
                $data['errors']['waterdichtheid'] = 'Voer een waterdichtheid in';
            } elseif (!is_numeric($_POST['waterdichtheid']) || $_POST['waterdichtheid'] < 0 || $_POST['waterdichtheid'] > 1000) {
                $data['errors']['waterdichtheid'] = 'Waterdichtheid moet tussen 0 en 1000 meter liggen';
            }

            // TYPE
            if (empty(trim($_POST['type']))) {
                $data['errors']['type'] = 'Voer een type in';
            }

            // UNIEK KENMERK
            if (empty(trim($_POST['uniekkenmerk']))) {
                $data['errors']['uniekkenmerk'] = 'Voer een uniek kenmerk in';
            }

            // OPSLAAN ALS GEEN FOUTEN
            if (empty($data['errors'])) {

                $this->horlogeModel->updateHorloge($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';

                header('Refresh: 3; URL=' . URLROOT . '/HorlogeController/index');
                exit;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden correct in';
            }
        }

        $data['horloge'] = $this->horlogeModel->getHorlogeById($Id);

        $this->view('horloge/update', $data);
    }
}
