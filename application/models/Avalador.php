<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avalador extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db->query("SET lc_time_names = 'es_MX'");
    }

    function guardar_avalador($sql) 
    {
        $query = $this->db->query($sql);
        return $query;
    }

    function trae_avalador($where){
        $this->db->select('*');
        $this->db->from('id_institucion');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre_completo','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function elimina_avalador($id_avalador) {
        $this->db->where('id_institucion',$id_avalador);
        $this->db->delete('tbl_instituciones');
    }

    function moficia_avalador($sql)
    {
        $query = $this->db->query($sql);
        return $query;
    }
}