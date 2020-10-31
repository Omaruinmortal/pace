<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_solicitado extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db->query("SET lc_time_names = 'es_MX'");
    }

    function guarda_curso_solicitado($sql)
    {
        $query = $this->db->query($sql);
        return $query;
    }

    function trae_cursos_solicitados($where)
    {
      $this->db->select('id_curso_solicitado,tipo_curso,DATE_FORMAT(fecha_solicitud_curso, "%d-%m-%Y") as fecha_solicitud_curso, estado');
      $this->db->from('tbl_cursos_solicitados');
      $this->db->order_by('fecha_solicitud_curso','asc');
      if($where != NULL) {
          $this->db->where($where, NULL, FALSE);
      }
      $query = $this->db->get();
      return $query->result();
    }

    function trae_fechas_calendario($where)
    {
      $this->db->select('id_curso_solicitado,nombre_institucion,tbl_cursos.nombre_curso_disciplina,DATE_FORMAT(fecha_solicitud_curso, "%Y-%m-%d") as fecha_solicitud_curso, estado');
      $this->db->from('tbl_cursos_solicitados,tbl_cursos');
      $this->db->order_by('fecha_solicitud_curso','asc');
      if($where != NULL) {
          $this->db->where($where, NULL, FALSE);
      }
      $query = $this->db->get();
      return $query->result();
    }

    function modificar_curso_solicitado($serv = array(), $where) {
        $this->db->trans_begin();
        $this->db->where($where);
        $this->db->update('tbl_cursos_solicitados', $serv);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function agrega_curso_rechazado($serv = array()){
        $this->db->trans_begin();
        $this->db->insert('tbl_cursos_rechazados', $serv);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $id = $this->db->insert_id();
            $this->db->trans_commit();
            return $id;
        }
    }

    function trae_mensaje_rechazo($where) {
        $this->db->select('*');
        $this->db->from('tbl_cursos_rechazados');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->row();
    }

    function trae_curso_solicitado($where) {
        $this->db->select('*');
        $this->db->from('view_cursos_solicitados');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->row();
    }

    function aprobacion_curso($serv = array(), $where) {
        $this->db->trans_begin();
        $this->db->where($where);
        $this->db->update('tbl_cursos_solicitados', $serv);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function trae_curso_solicitado_papeleria($where) {
        $this->db->select('*');
        $this->db->from('view_papeleria');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function trae_nac_curso($where) {
        $this->db->select('*');
        $this->db->from('tbl_curso_nac');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }




}
