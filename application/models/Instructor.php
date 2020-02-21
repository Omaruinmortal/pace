<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db->query("SET lc_time_names = 'es_MX'");
    }

    function guarda_instructor($sql) 
    {
        $query = $this->db->query($sql);
        return $query;
    }

    function trae_instructores($where){
        $this->db->select('*');
        $this->db->from('tbl_instructores');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre_instructor','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function elimina_instructor($id_instructor) {
        $this->db->where('id_instructor',$id_instructor);
        $this->db->delete('tbl_instructores');
    }

    function modifica_instructor($sql)
    {
        $query = $this->db->query($sql);
        return $query;
    }

    function cantidad_todos_intructores($where){
        $this->db->select('count(*) as total');
        $this->db->from('tbl_instructores');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }
}