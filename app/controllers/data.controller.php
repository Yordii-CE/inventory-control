<?php
class DataController extends Controller
{
    function __construct()
    {
        $this->loadModel();
    }

    function create()
    {
        $id = $_POST['id'];
        $rfc = $_POST['rfc'];
        $curp = $_POST['curp'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $passport = $_POST['passport'];
        $startingSalary = $_POST['starting-salary'];
        $phone = $_POST['phone'];
        $bornDate = $_POST['born-date'];
        $driverLicense = $_POST['driver-license'];
        $socialSecurityNumber = $_POST['social-security-number'];
        $integratedDailyWage = $_POST['integrated-daily-wage'];

        $this->model->insert(
            $id,
            $rfc,
            $curp,
            $gender,
            $email,
            $passport,
            $startingSalary,
            $phone,
            $bornDate,
            $driverLicense,
            $socialSecurityNumber,
            $integratedDailyWage
        );

        $this->redirectToAction('data', 'employees', [$id]);
    }

    function update()
    {
        $id = $_POST['id'];

        if (isset($_POST['personal-btn'])) {
            $rfc = $_POST['rfc'];
            $curp = $_POST['curp'];
            $gender = $_POST['gender'];
            $bornDate = $_POST['born-date'];
            $this->model->updatePersonalInfo($id, $rfc, $curp, $gender, $bornDate);
        }

        if (isset($_POST['labor-btn'])) {
            $startingSalary = $_POST['starting-salary'];
            $integratedDailyWage = $_POST['integrated-daily-wage'];

            $this->model->updateLaborInfo($id, $startingSalary, $integratedDailyWage);
        }

        if (isset($_POST['contact-btn'])) {
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $this->model->updateContactInfo($id, $email, $phone);
        }

        if (isset($_POST['additional-btn'])) {
            $passport = $_POST['passport'];
            $driverLicense = $_POST['driver-license'];
            $socialSecurityNumber = $_POST['social-security-number'];

            $this->model->updateAdditionalInfo($id, $passport, $driverLicense, $socialSecurityNumber);
        }

        $this->redirectToAction('data', 'employees', [$id]);
    }
}
