<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_model extends CI_model
{

    /**
     * Model table name in databse
     * 
     * @var string
     */
    private const TABLE = 'messages';

    /**
     * Insert a new message in database
     * 
     * @param array $message
     * @return boolean
     */
    public function insert(array $message)
    {
        return $this->db->insert(self::TABLE, $message);
    }

    /**
     * Mark message as seen in databse
     * 
     * @param integer $message_id
     * @return boolean
     */
    public function mark_as_read(int $message_id)
    {
        return $this->db->where('message_id', $message_id)
                        ->update(self::TABLE, ['seen' => 1]);
    }

    /**
     * Delete message from database
     * 
     * @param 
     */
    public function delete(int $message_id = NULL)
    {
        if($message_id != null) $this->db->where('message_id', $message_id);
        return $this->db->delete(self::TABLE);
    }

}