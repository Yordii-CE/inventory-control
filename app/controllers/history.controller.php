<?php
class HistoryController extends Controller
{
    function __construct()
    {
        $this->loadModel();
    }
    function index()
    {
        $employees = $this->model->getAll();
        $this->view(['employees' => $employees]);
    }

    function change($id)
    {
        $this->model->change($id);

        $this->redirectToAction();
    }
}
