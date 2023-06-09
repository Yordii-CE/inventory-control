<?php
class DataModel extends Model
{
    function __construct()
    {
        $this->loadDatabase();
    }

    function insert(
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
    ) {
        $this->db->insert("insert into datos_personales(
            rfc,
            curp,
            genero,
            correo,
            pasaporte,
            salario_inicial,
            numero_telefono,
            fecha_nacimiento,
            licencia_conducir,
            numero_seguro_social,
            salario_diario_integrado,
            id_empleado
            )
        values(            
            '$rfc',
            '$curp',
            '$gender',
            '$email',
            '$passport',
            '$startingSalary',
            '$phone',
            '$bornDate',
            '$driverLicense',
            $socialSecurityNumber,
            $integratedDailyWage,
            $id
        )");
    }

    function updatePersonalInfo($id, $rfc, $curp, $gender, $bornDate)
    {
        $this->db->update("update datos_personales set 
        rfc = '$rfc',
        curp = '$curp',
        genero = '$gender',
        fecha_nacimiento = '$bornDate'

        where id_empleado = $id");
    }
    function updateLaborInfo($id, $startingSalary, $integratedDailyWage)
    {
        $this->db->update("update datos_personales set 
        salario_inicial = $startingSalary,
        salario_diario_integrado = $integratedDailyWage

        where id_empleado = $id");
    }
    function updateContactInfo($id, $email, $phone)
    {
        $this->db->update("update datos_personales set 
        correo = '$email',
        numero_telefono = '$phone'

        where id_empleado = $id");
    }
    function updateAdditionalInfo($id, $passport, $driverLicense, $socialSecurityNumber)
    {
        $this->db->update("update datos_personales set 
        pasaporte = '$passport',
        licencia_conducir = '$driverLicense',
        numero_seguro_social = '$socialSecurityNumber'

        where id_empleado = $id");
    }
}
