<?php
class TypesController extends Controller
{
    function __construct()
    {
        $this->loadModel();
    }
    function index()
    {
        $this->view(['models' => $this->model->getAll()]);
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
