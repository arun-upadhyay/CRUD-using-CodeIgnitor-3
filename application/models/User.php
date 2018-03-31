<?php

/*
  /*
 * Author: Arun Kumar Upadhyay
 */

class User extends CI_Model
{

    public function get_data()
    {
        $this->load->database();
        $query = $this->db->get("user");
        $data["users"] = $query->result();
        return $data;
    }

    public function insert_data($post_data)
    {
        $this->load->database();
        $this->db->insert("user", $post_data);
    }

    public function delete_data($id)
    {
        if ($this->db->delete("user", "id = " . $id)) {
            return true;
        }
    }

    public function edit_data($post_data)
    {

        $data = array(
            'name' => $post_data['name'],
            'address' => $post_data['address'],
            'phoneno' => $post_data['phoneno']
        );

        $this->db->set($data);
        $this->db->where("id", $post_data['id']);
        $this->db->update("user", $data);
    }

    public function fill_data($id)
    {
        $this->load->database();
        $query = $this->db->get_where("user", array("id" => $id));
        $data["user"] = $query->row();
        return $data;
    }

}
