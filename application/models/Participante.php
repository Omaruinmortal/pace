<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participante extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db->query("SET lc_time_names = 'es_MX'");
    }

    function guarda_participante($sql) 
    {
        $query = $this->db->query($sql);
        return $query;
    }

    function trae_participantes($where){
        $this->db->select('*');
        $this->db->from('tbl_participantes');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function trae_un_participantes($where){
        $this->db->select('*');
        $this->db->from('tbl_participantes');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->row();
        
    }

}