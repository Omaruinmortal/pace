<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db->query("SET lc_time_names = 'es_MX'");
    }

    function guardar_cartel($sql) 
    {
        $query = $this->db->query($sql);
        return $query;
    }

    function trae_cartel($where){
        $this->db->select('*');
        $this->db->from('tbl_carteles');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre_cartel','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function elimina_cartel($id_cartel) {
        $this->db->where('id_carteles',$id_cartel);
        $this->db->delete('tbl_carteles');
    }
}