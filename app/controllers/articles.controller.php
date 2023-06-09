<?php
class ArticlesController extends Controller
{

    function __construct()
    {
        $this->loadModel();
    }

    function index()
    {
        $this->view(
            [
                'articles' => $this->model->getAll(),
                'brands' => $this->model->getBrands(),
                'models' => $this->model->getModels()
            ]
        );
    }

    function create()
    {
        $serial = $_POST['serial'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $responsibleName = $_POST['responsible-name'];
        $brandId = $_POST['brand-id'];
        $modelId = $_POST['model-id'];

        $this->model->insert($serial, $name, $description, $stock, $responsibleName, $brandId, $modelId);

        $this->redirectToAction();
    }

    function update()
    {
        $id = $_POST['id'];
        $serial = $_POST['serial'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $responsibleName = $_POST['responsible-name'];
        $brandId = $_POST['brand-id'];
        $modelId = $_POST['model-id'];


        $this->model->update($id, $serial, $name, $description, $stock, $responsibleName, $brandId, $modelId);

        $this->redirectToAction();
    }

    function delete($id)
    {
        $this->model->delete($id);

        $this->redirectToAction();
    }
}
