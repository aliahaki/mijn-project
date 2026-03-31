<?php

class ZangeresController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('Zangeres');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->zangeresModel->getAllZangeressen();

        $data = [
            'title' => 'Rijkste Zangeressen',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('zangeres/index', $data);
    }

    public function delete($Id)
    {
        $this->zangeresModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/ZangeresController/index');
        exit;
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe zangeres toevoegen',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty(trim($_POST['naam']))) {
                $data['errors']['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 20) {
                $data['errors']['naam'] = 'Naam mag maximaal 20 tekens bevatten';
            }

            if (empty($_POST['vermogen'])) {
                $data['errors']['vermogen'] = 'Voer een vermogen in';
            } elseif (!is_numeric($_POST['vermogen']) || $_POST['vermogen'] < 0 || $_POST['vermogen'] > 1000000000) {
                $data['errors']['vermogen'] = 'Vermogen moet tussen 0 en 1 miljard liggen';
            }

            if (empty(trim($_POST['nationaliteit']))) {
                $data['errors']['nationaliteit'] = 'Voer een nationaliteit in';
            }

            if (empty($_POST['leeftijd'])) {
                $data['errors']['leeftijd'] = 'Voer een leeftijd in';
            } elseif (!is_numeric($_POST['leeftijd']) || $_POST['leeftijd'] < 1 || $_POST['leeftijd'] > 120) {
                $data['errors']['leeftijd'] = 'Leeftijd moet tussen 1 en 120 liggen';
            }

            if (empty(trim($_POST['genre']))) {
                $data['errors']['genre'] = 'Voer een genre in';
            }

            if (empty(trim($_POST['hitsong']))) {
                $data['errors']['hitsong'] = 'Voer een hit song in';
            }

            if (empty($_POST['releasedatum'])) {
                $data['errors']['releasedatum'] = 'Voer een releasedatum in';
            }

            if (empty($data['errors'])) {

                $this->zangeresModel->create($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                header('Refresh: 3; URL=' . URLROOT . '/ZangeresController/index');
                exit;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden correct in';
            }
        }

        $this->view('zangeres/create', $data);
    }

    public function update($Id = NULL)
    {
        $data = [
            'title'   => 'Wijzig zangeres',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty(trim($_POST['naam']))) {
                $data['errors']['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 20) {
                $data['errors']['naam'] = 'Naam mag maximaal 20 tekens bevatten';
            }

            if (empty($_POST['vermogen'])) {
                $data['errors']['vermogen'] = 'Voer een vermogen in';
            } elseif (!is_numeric($_POST['vermogen']) || $_POST['vermogen'] < 0 || $_POST['vermogen'] > 1000000000) {
                $data['errors']['vermogen'] = 'Vermogen moet tussen 0 en 1 miljard liggen';
            }

            if (empty(trim($_POST['nationaliteit']))) {
                $data['errors']['nationaliteit'] = 'Voer een nationaliteit in';
            }

            if (empty($_POST['leeftijd'])) {
                $data['errors']['leeftijd'] = 'Voer een leeftijd in';
            } elseif (!is_numeric($_POST['leeftijd']) || $_POST['leeftijd'] < 1 || $_POST['leeftijd'] > 120) {
                $data['errors']['leeftijd'] = 'Leeftijd moet tussen 1 en 120 liggen';
            }

            if (empty(trim($_POST['genre']))) {
                $data['errors']['genre'] = 'Voer een genre in';
            }

            if (empty(trim($_POST['hitsong']))) {
                $data['errors']['hitsong'] = 'Voer een hit song in';
            }

            if (empty($_POST['releasedatum'])) {
                $data['errors']['releasedatum'] = 'Voer een releasedatum in';
            }

            if (empty($data['errors'])) {

                $this->zangeresModel->updateZangeres($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';

                header('Refresh: 3; URL=' . URLROOT . '/ZangeresController/index');
                exit;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden correct in';
            }
        }

        $data['zangeres'] = $this->zangeresModel->getZangeresById($Id);

        $this->view('zangeres/update', $data);
    }
}
