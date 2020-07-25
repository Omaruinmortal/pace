<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db->query("SET lc_time_names = 'es_MX'");
    }

    function guardar_curso($sql)
    {
        $query = $this->db->query($sql);
        return $query;
    }

    function trae_curso($where){
        $this->db->select('*');
        $this->db->from('tbl_cursos');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre_curso_disciplina','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function trae_un_curso($where){
        $this->db->select('*');
        $this->db->from('tbl_cursos');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre_curso_disciplina','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->row();
    }

    function elimina_curso($id_curso) {
        $this->db->where('id_curso',$id_curso);
        $this->db->delete('tbl_cursos');
    }

    function modifica_curso($sql)
    {
        $query = $this->db->query($sql);
        return $query;
    }

    function cantidad_todos_cursos($where){
        $this->db->select('count(*) as total');
        $this->db->from('tbl_cursos');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

}
