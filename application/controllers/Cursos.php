<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cursos extends CI_Controller
{

    private $defaultData = array(
        'title' => 'SISTEMA',
        'layout' => 'plantilla/lytDefault',
        'contentView' => 'vUndefined',
        'stylecss' => '',
    );

    private function _renderView($data = array())
    {
        $data = array_merge($this->defaultData, $data);
        $this->load->view($data['layout'], $data);
        //$this->removeCache();
        //ejemplo
    }

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->library('form_validation');
        $this->load->model('curso');
        $this->load->model('admin');
        date_default_timezone_set('America/Mexico_City');
    }

    public function guarda_curso() 
    {
        if ($this->input->is_ajax_request()) {
            $nombre_curso = $this->input->post("nombre_curso");
            $id_institucion = $this->input->post("id_institucion");
            $precio = $this->input->post("precio");
            

            $this->form_validation->set_rules('nombre_curso', 'Nombre curso', 'required');  
            $this->form_validation->set_rules('precio', 'precio', 'required'); 
            $this->form_validation->set_rules('id_institucion', 'Institucion', 'required|callback_select_validate');            

            $this->form_validation->set_message("nombre_curso", "El campo nombre de curso es requerido");
            $this->form_validation->set_message("precio", "El campo precio es requerido");
            $this->form_validation->set_message("id_institucion", "El campo de institucion es requerido");

            if ($this->form_validation->run() == TRUE) {
                $sql = "INSERT INTO tbl_cursos (nombre_curso_disciplina, id_institucion, precio_iva)
                values ('".$nombre_curso."','" . $id_institucion . "', '".$precio."')";
                
                $res = $this->curso->guardar_curso($sql);
                
                $array = array(
                    'success' => 'OK'
                );
            } else {
                $array = array(
                    'error' => true,
                    'nombre_curso_error' => form_error('nombre_curso', null, null),
                    'precio_error' => form_error('precio', null, null),
                    'id_institucion_error' => form_error('id_institucion', null, null),
                   
                );
            }

            echo json_encode($array);
        }
    }

    public function trae_avalador()
    {
        $where = "";
        $datos = $this->curso->trae_curso($where);
        foreach ($datos as $row) {
            $data[] = array(
                $row->nombre_curso_disciplina,
                $row->id_instituciones,  
                $row->precio_iva,  
                '<button type="button" id="btn_modifica_avalador" data-id="' . $row->id_curso . '"  title="Modificar" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 4px;"><span class="ti-pencil"></span></button>
                <button type="button" id="btn_eliminar_avalador" data-id="' . $row->id_curso   . '" title="Eliminar" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>'
            );
        }
        $result = array(
            "data" => $data
        );
        echo json_encode($result);
    }

    public function elimina_avalador()
    {
        $id_avalador = $this->input->post('id', TRUE);
        $this->avalador->elimina_avalador($id_avalador);
        echo 'true';
    }

    public function modifica_avalador()
    {
        if ($this->input->is_ajax_request()) {
            $id_institucion = $this->input->post("id_institucion");
            $nombre_completo = $this->input->post("nombre_completo");
            $acronimo = $this->input->post("acronimo");

            $this->form_validation->set_rules('nombre_completo', 'Nombre', 'required'); 
            $this->form_validation->set_rules('acronimo', 'Acronimo', 'required');            

            $this->form_validation->set_message("nombre_completo", "El campo nombre completo es requerido");
            $this->form_validation->set_message("acronimo", "El campo acronimo es requerido");

            if ($this->form_validation->run() == TRUE) {
                //aqui pendiente agregar variables a array DATA de modelo

                $sql = "UPDATE tbl_instituciones SET 
                        nombre_completo='".$nombre_completo."',
                        acronimo='".$acronimo."'
                        WHERE id_institucion='".$id_institucion."'";
                $this->avalador->moficia_avalador($sql);
                $array = array(
                    'success' => 'OK'
                );
            } else {
                $array = array(
                    'error' => true,
                    'nombre_error' => form_error('nombre_completo', null, null),
                    'acronimo_error' => form_error('acronimo', null, null),
                );
            }

            echo json_encode($array);
        }
    }

    public function select_validate($abcd)
    {
        // 'none' is the first option that is default "-------Choose City-------"
        if ($abcd == "none") {
            $this->form_validation->set_message('select_validate', 'Debe seleccionar una institución');
            return false;
        } else {
            // User picked something.
            return true;
        }
    }

}