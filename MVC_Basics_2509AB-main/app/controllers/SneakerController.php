<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index($display='none', $message='')
    {
        // Haal alle sneakers op
        $result = $this->sneakerModel->getAllSneakers();

        // Data voor de view
        $data = [
            'title' => 'Overzicht Sneakers',
            'display' => $display,
            'message' => $message,
            'result'  =>  $result
        ];

        // Laad de view
        $this->view('sneaker/index', $data);
    }

    public function delete($id)
{
    $this->sneakerModel->delete($id);

    header('Refresh:3; url=' . URLROOT . '/sneakerController/index');

    $this->index('flex', 'Record is verwijderd!');
}

}