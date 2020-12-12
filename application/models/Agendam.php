<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agendam extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db->query("SET lc_time_names = 'es_MX'");
    }

    function guardar_agenda($sql) 
    {
        $query = $this->db->query($sql);
        return $query;
    }

      
}