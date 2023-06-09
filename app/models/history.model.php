<?php
class HistoryModel extends Model
{
    function __construct()
    {
        $this->loadDatabase();
    }
    function getAll()
    {
        $employees = $this->db->select("select historial_empleados.*, empleados.nombre, empleados.id 'idEmpleado'  from empleados join historial_empleados
       on empleados.id = historial_empleados.id_empleado");
        return $employees;
    }

    function change($id)
    {

        $employee = $this->db->select("select * from empleados
        join historial_empleados on empleados.id = historial_empleados.id_empleado
        where empleados.id = $id");

        if ($employee[0]['fecha_baja'] == '') {
            $this->db->select("update historial_empleados set fecha_baja = CURDATE() where id_empleado = $id");
        } else {
            $this->db->select("update historial_empleados set fecha_baja = null where id_empleado = $id");
        }
    }
}
