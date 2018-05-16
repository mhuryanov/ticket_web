<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Apibase extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

        $headers = $this->input->request_headers();

        // echo $headers['Token'];

        $this->user = $this->user_model->getUserByToken($headers['Token']);
        // var_dump($user);
        if($this->user == false){
            echo json_encode(array('success' => false, "msg" => "token is mismatched!"));
            exit();
        } 
    }
}