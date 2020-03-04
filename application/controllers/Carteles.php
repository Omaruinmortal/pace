<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carteles extends CI_Controller
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
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        $this->load->model('curso');
        $this->load->model('admin');
        $this->load->model('avalador');
        $this->load->model('cartel');
        date_default_timezone_set('America/Mexico_City');
    }

    public function guarda_cartel() 
    {
        if ($this->input->is_ajax_request()) {            
            
            $nombre_cartel = $this->input->post("nombre_cartel");      
            $this->form_validation->set_rules('nombre_cartel', 'Nombre cartel', 'required');
            $this->form_validation->set_message("nombre_cartel", "El campo nombre del cartel es requerido");
            

            if ($this->form_validation->run() == TRUE) {
                
                if(isset($_FILES["archivo_cartel"]['name'])){
                    
                    $config['upload_path']      = './assets/carteles';
                    $config['allowed_types']    = 'pdf';
                    $config['max_size']         = '2048';
                    $config['encrypt_name']     = true;
                    $config['remove_spaces']    = true;
                    
                    $this->load->library("upload",$config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload("archivo_cartel")){
                        $data = $this->upload->data();

                        $sql = "INSERT INTO tbl_carteles (nombre_cartel, archivo_cartel)
                        values ('".$nombre_cartel."','" . $data['file_name'] . "')";
                        
                        $res = $this->cartel->guardar_cartel($sql);
                        
                        if($res == true){
                            $array = array(
                                'success' => 'OK'
                            );
                        }
                    }else{
                        $array = array(
                            'error' => true,
                            'archivo_error' => $this->upload->display_errors()
                        );
                    }
                }      
            } else {
                $array = array(
                    'error' => true,
                    'nombre_cartel_error' => form_error('nombre_cartel', null, null),                  
                );
            }

            echo json_encode($array);
        }
    }

    public function trae_carteles()
    {
        $where = "";
        $datos = $this->cartel->trae_cartel($where);
        
        foreach ($datos as $row) {
            
            $data[] = array(
                $row->nombre_cartel,
                '<button type="button" id="btn_ver_cartel" data-id="' . $row->archivo_cartel . '"  title="Ver" data-toggle="modal" data-target=".bd-example-modal-lg" class="tabledit-edit-button btn btn-sm btn-success" style="float: none; margin: 4px;"><span class="fas fa-eye"></span></button>
                <button type="button" id="btn_eliminar_cartel" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="' . $row->id_carteles   . '" title="Eliminar" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>'
                 
            );
        }
        $result = array(
            "data" => $data
        );
        echo json_encode($result);
    }

    public function elimina_cartel()
    {
        $id_cartel = $this->input->post('id', TRUE);
        $this->cartel->elimina_cartel($id_cartel);
        echo 'true';
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