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
        $this->db->select('id_tipoUsuario,tipo_usuario');
        $this->db->from('tbl_tipousuarios');
        $this->db->where('visible = 1');
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

    function trae_usuarios($where){
        $this->db->select('id_usuario, nombre, primerApellido, segundoApellido, correo, telefono, usuario, id_tipoUsuario');
        $this->db->from('tbl_usuarios');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function trae_usuario($where){
        $this->db->select('id_usuario, nombre, primerApellido, segundoApellido, correo, telefono, usuario, contrasenia, id_tipoUsuario');
        $this->db->from('tbl_usuarios');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function trae_un_usuario($where){
        $this->db->select('id_usuario, nombre, primerApellido, segundoApellido, correo, telefono, usuario, id_tipoUsuario');
        $this->db->from('tbl_usuarios');
        $this->db->where('visible = 1');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->row();
    }

    function elimina_usuario($id_usuario) {
        $this->db->where('id_usuario',$id_usuario);
        $this->db->delete('tbl_usuarios');
    }

    function modifica_usuario($sql)
    {
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

    function cantidad_todos_usuarios($where){
        $this->db->select('count(*) as total');
        $this->db->from('tbl_usuarios');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function trae_estados($where){
        $this->db->select('*');
        $this->db->from('tbl_estados');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre','asc');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function trae_estado($where){
        $this->db->select('*');
        $this->db->from('tbl_estados');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre','asc');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->row();
    }


    function trae_ciudad($where){
        $this->db->select('*');
        $this->db->from('tbl_municipios');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre','asc');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function guarda_curso_rechazado($serv = array(), $where) {
        $this->db->trans_begin();
        $this->db->where($where);
        $this->db->insert('tbl_cursos_rechazados', $serv);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}
