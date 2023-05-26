<?php
class EmployeesController extends Controller
{
    function __construct()
    {
        $this->loadModel();
    }
    function index()
    {
        $this->view(['employees' => $this->model->getAll()]);
    }

    function bajas()
    {
        $this->view(['employees' => $this->model->getLaidOff()]);
    }

    function data($id)
    {
        $employee = $this->model->getById($id);
        $personalData = $this->model->getPersonalData($id);

        $this->view(['employee' => $employee, 'personalData' => $personalData]);
    }
    function create()
    {
        $name = $_POST['name'];
        $stand = $_POST['stand'];
        $department = $_POST['department'];
        $signedContract = $_POST['signed-contract'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $address = $_POST['address'];

        $this->model->insert($name, $stand, $department, $signedContract, $country, $city, $address);

        $this->redirectToAction();
    }

    function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $stand = $_POST['stand'];
        $department = $_POST['department'];
        $signedContract = $_POST['signed-contract'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $address = $_POST['address'];

        $this->model->update($id, $name, $stand, $department, $signedContract, $country, $city, $address);

        $this->redirectToAction();
    }

    function alta($id)
    {
        $this->model->alta($id);

        $this->redirectToAction('bajas');
    }

    function delete($id)
    {
        $this->model->delete($id);
        $this->redirectToAction();
    }
}
