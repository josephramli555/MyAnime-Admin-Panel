<?php

namespace App\Models;

use CodeIgniter\Model;


class AuthModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'user_id';
    protected $session;
    // protected $returnType     = 'array';
    protected $allowedFields = ['user_id', 'password', 'profile_name', 'user_role', 'profile_img'];

    public function login($input)
    {
        $userid = $this->db->escape($input['user_id']);
        $password = $this->db->escape($input['password']);

        // dd($userid);
        $results = $this->db->query("SELECT * FROM users where user_id = $userid AND password= $password")->getResult();
        // $query_login = $this->findAll();
        // dd($results);
        if (!empty($results)) {
                $result = $results[0];
                $session = [
                    'user_id' => $result->user_id,
                    'name' => $result->profile_name,
                    'img' => $result->profile_img,
                    'role' => $result->user_role,
                    'login' => TRUE
                ];
            // dd($session);
            session()->set($session);
            return TRUE;
            // return redirect('/home');
        } else {
            return FALSE;
            // return redirect()->to('/user/login_page');
        }
    }

    public function search_user($user_id)
    {
        return $this->where('user_id',$user_id)->first();
    }
}
