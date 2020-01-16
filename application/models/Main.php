<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db->query("SET lc_time_names = 'es_MX'");
    }

    function trae_fechayhora(){
        $this->db->select('NOW()');
        $query = $this->db->get();
        return $query->result();
    }

    function trae_tipoUsuarios($where){
        $this->db->select('*');
        $this->db->from('tbl_tipousuarios');
        $this->db->where('visible = 1 ');
        $this->db->order_by('id_tipoUsuario');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function guardar_usuario($sql){
        $query = $this->db->query($sql);
        return $query;
    }

    function trae_usuario_existente($where){
        $this->db->select('*');
        $this->db->from('tbl_usuarios');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->count_all_results();
        return $query;
    }

}