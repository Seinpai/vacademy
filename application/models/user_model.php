<?php
	/**
	* 
	*/
	class User_model extends CI_model
	{
		public function register_user($user)
		{
			# code...
			$this->db->insert('tabel_user', $user);
		}

		public function login_user($email, $pass)
		{
			# code...
			$this->db->select('*');
			$this->db->from('tabel_user');
			$this->db->where('user_email', $email);
			$this->db->where('user_password', $pass);

			if ($query = $this->db->get()) {
				# code...
				return $query->row_array();
			} else {
				# code...
				return false;
			}
		}

		public function check_email($email)
		{
			# code...
			$this->db->select('*');
			$this->db->from('tabel_user');
			$this->db->where('user_email', $email);

			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				# code...
				return false;
			} else {
				# code...
				return true;
			}
		}
	}

?>