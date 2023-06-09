<?php
class EmployeesModel extends Model
{
    function __construct()
    {
        $this->loadDatabase();
    }

    function getAll()
    {
        $employees = $this->db->select("select empleados.* from empleados join historial_empleados
        on empleados.id = historial_empleados.id_empleado where historial_empleados.fecha_baja is null");
        return $employees;
    }

    function getLaidOff()
    {
        $employees = $this->db->select("select empleados.* from empleados join historial_empleados
        on empleados.id = historial_empleados.id_empleado where historial_empleados.fecha_baja is not null");
        return $employees;
    }

    function getById($id)
    {
        $employee = $this->db->select("select * from empleados where id = $id");
        return $employee == null ? null : $employee[0];
    }

    function getPersonalData($id)
    {
        $personalData = $this->db->select("select * from datos_personales where id_empleado = $id");

        return $personalData == null ? null : $personalData[0];
    }

    function insert($name, $stand, $department, $signedContract, $typeContract, $country, $city, $address)
    {
        $this->db->insert("insert into empleados(nombre, puesto, departamento, contrato_firmado, tipo_contrato, pais, ciudad, direccion)
        values('$name', '$stand', '$department', '$signedContract', '$typeContract', '$country', '$city', '$address')");

        $id = $this->db->connection->lastInsertId();

        $this->db->insert("insert into historial_empleados(fecha_contratacion, fecha_baja, id_empleado)
        values(CURDATE(), null, $id)");
    }

    function update($id, $name, $stand, $department, $signedContract, $typeContract, $country, $city, $address)
    {
        $this->db->update("update empleados set 
        nombre = '$name', 
        puesto = '$stand', 
        departamento = '$department', 
        contrato_firmado = '$signedContract', 
        tipo_contrato = '$typeContract', 
        pais = '$country', 
        ciudad = '$city', 
        direccion = '$address'

        where id = $id");
    }

    function delete($id)
    {
        $this->db->delete("delete from historial_empleados where id_empleado = $id");
        $this->db->delete("delete from empleados where id = $id");
    }
    function alta($id)
    {
        $this->db->update("update historial_empleados set fecha_baja = null where id_empleado = $id");
    }
}
