<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_model extends CI_model
{

    /**
     * Model table name in databse
     * 
     * @var string
     */
    private const TABLE = 'accounts';

    /**
     * Get account by username or password
     * 
     */
    public function get_account(string $username)
    {
        return $this->db->where('email', $username)
                        ->get(self::TABLE)
                        ->result_array()[0] ?? [];
    }

}