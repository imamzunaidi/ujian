<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Data_rute extends CI_Controller {
    
    public function index()
    {
        $data = array(
            'title' => 'Data rute',
            'data_rute' => $this->M_rute->get_all(),
        );
        $this->templates->admin('v_data_rute', $data);
    }

    public function insert(){
        
        $this->form_validation->set_rules('point_start', 'Point Start', 'required');
        $this->form_validation->set_rules('point_end', 'Point End', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'nama_rute' => $this->input->post('nama_rute', TRUE),
            );
     
             $this->M_rute->insert($data);
             $this->flash_message->success('Tambahkan', 'data-rute');
        }
        
       
    }

    public function update(){
        $id_rute = $this->input->post('id_rute', TRUE);

        $data = array(
            'nama_rute' => $this->input->post('nama_rute', TRUE),
        );
      
        $this->M_rute->update($data, $id_rute);
        $this->flash_message->success('Update', 'data-rute');
    }

    public function delete($id_rute){       
        $this->M_rute->delete($id_rute);
        $this->flash_message->success('Di hapus', 'data-rute');
    
    }

}

/* End of file Data_rute.php */