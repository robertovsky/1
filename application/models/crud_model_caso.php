   <?php 
 	class Crud_model_caso extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

public function nuevo_caso($nombre_caso,$reporto_caso,$descripcion,$fecha_reporte,$ubicacion,$estado,$asignado)
{
   $this->db->insert('caso', array(
        'nombre_caso'                  =>$nombre_caso,
        'reporto_caso'                =>$reporto_caso,
        'descripcion'                 =>$descripcion,
        'fecha_reporte'               =>$fecha_reporte,
        'ubicacion'                   =>$ubicacion,
        'estado'                      =>$estado,
        'asignado'                    =>$asignado

        ));

 
 }
 public function inser_responsable($id_caso,$responsable,$fecha_asignacion,$asignado)
 {
  $this->db->insert('seguimiento', array(
        'id_caso'                     =>$id_caso,
        'responsable'                 =>$responsable,
        'fecha_asignacion'            =>$fecha_asignacion
        ));

  $this->db->where('id_caso', $id_caso);
        $this->db->update('caso',array(            
            'asignado'        => $asignado
            
        ));

 }

  public function get_casos()
    {    
        $query = $this->db->query('SELECT * from caso where estado = 1 and asignado = 0');
         return $query->result();
        } 

    public function get_caso($id_caso)
    {
        $sql = $this->db->get_where('caso',array('id_caso'=>$id_caso));
        if($sql->num_rows()==1)
        return $sql->row_array();
        else
        return false;  
    }
}

    ?>