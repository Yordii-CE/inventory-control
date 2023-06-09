<?php
class BrandsController extends Controller
{
    function __construct()
    {
        $this->loadModel();
    }
    function index()
    {
        $this->view(['brands' => $this->model->getAll()]);
    }

    function create()
    {
        $name = $_POST['name'];
        $this->model->insert($name);

        $this->redirectToAction();
    }

    function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];

        $this->model->update($id, $name);

        $this->redirectToAction();
    }
}
