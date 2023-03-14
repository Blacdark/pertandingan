<?php

class Fungsi
{

    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('Model_user');
        $id_user = $this->ci->session->userdata('iduser');
        $user_data = $this->ci->Model_user->get($id_user)->row();
        return $user_data;
    }

    public function alternatif()
    {
        $this->ci->load->model('model_alternatif');
        return $this->ci->model_alternatif->get()->num_rows();
    }

    public function Kriteria()
    {
        $this->ci->load->model('model_kriteria');
        return $this->ci->model_kriteria->get()->num_rows();
    }
    public function subKriteria()
    {
        $this->ci->load->model('model_subkriteria');
        return $this->ci->model_subkriteria->get()->num_rows();
    }
    public function user()
    {
        $this->ci->load->model('model_user');
        return $this->ci->model_user->get()->num_rows();
    }

}
