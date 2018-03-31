<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Author: Arun Kumar Upadhyay
 */
class UserController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->get_data();
    }

    // retrieve all the database records for user
    public function get_data()
    {
        $data = $this->user->get_data();
        $this->load->view('add_user', $data);
    }

    // save new record to user table
    public function save_data()
    {

        $this->form_validation();
        if ($this->form_validation->run() == FALSE) {
            $data = $this->user->get_data();
            $this->load->view('add_user', $data);
        } else {
            $data = $this->input->post();
            $this->user->insert_data($data);
            $this->get_data();
        }
    }

    // delete user record based on user_id
    public function delete_data($id)
    {
        $this->load->model("user");
        $this->user->delete_data($id);
        $this->get_data();
    }

    // edit existing user record based on user_id
    public function edit_data()
    {
        $this->form_validation();
        $data = $this->input->post();
        if ($this->form_validation->run() == FALSE) {
            $this->fill_data($data['id']);
        } else {
            $this->user->edit_data($data);
            $this->get_data();
        }
    }

    public function fill_data($id)
    {
        $data = $this->user->fill_data($id);
        $this->load->view('add_user', $data);
    }

    // form validation
    private function form_validation()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phoneno', 'Phone number', 'required');
    }

}
