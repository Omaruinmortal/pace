<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temas extends CI_Model
{
	//fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user_id');
    }

    function trae_temas_curso($where)
    {
        $this->db->select('*');
        $this->db->from('vw_temas_agenda');
        $this->db->where('visible = 1');
        $this->db->order_by('id_tema','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();        
    }

    function trae_subtemas_curso($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_cat_subtemas');
        $this->db->where('visible = 1');
        $this->db->order_by('subtema_id','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();        
    }

    function trae_agenda($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_agenda');
        $this->db->where('curso_visible = 1');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->row();       
    }
}