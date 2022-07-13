<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function save($data)
    {
        $this->db->query("ALTER TABLE users AUTO_INCREMENT 1");
        $this->db->insert("users", $data);
    }

    public function getUsers()
    {
        $this->db->select("`id`, `name`, `lastname`, `email`, `role_id`, (SELECT roles.role FROM roles WHERE roles.id = users.role_id) AS role_text, `status_user`, `created`, `modified`");
        $this->db->from("users");
        $result = $this->db->get();
        return $result->result();
    }

    public function getUser($id)
    {
        $this->db->select("`id`, `name`, `lastname`, `email`, `role_id`, (SELECT roles.role FROM roles WHERE roles.id = users.role_id) AS role_text, `status_user`");
        $this->db->from("users");
        $this->db->where("users.id ", $id);
        $result = $this->db->get();
        return $result->row();
    }

    public function update($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update("users", $data);
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("users");
    }

    public function login($username, $password)
    {
        $this->db->where("email", $username);
        $this->db->where("password", $password);

        $resultados = $this->db->get("users");
        if ($resultados->num_rows() > 0) {
            return $resultados->row();
        } else {
            return false;
        }
    }
}
