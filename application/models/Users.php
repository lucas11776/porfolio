<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{

    /**
     * Model table name in databse
     * 
     * @var string
     */
    private const TABLE = 'users';

    /**
     * Insert new account in database
     * 
     * @param array $user
     * @return boolean
     */
    public function insert(array $user)
    {
        return $this->db->insert(self::TABLE, $user);
    }

    /**
     * Get user accounts from database
     * 
     * @var array $where
     * @var integer $limit
     * @var integer $offset
     * @return array
     */
    public function get(array $where = NULL, int $limit = NULL, int $offset = NULL)
    {
        return $this->db->where($where)
                        ->get(self::TABLE, $limit, $offset);
    }

    /**
     * Delete user account or accounts
     * 
     * @param array $where
     * @return boolean
     */
    public function delete(array $where)
    {
        return $this->db->where($where)
                        ->delete(self::TABLE);
    }

}