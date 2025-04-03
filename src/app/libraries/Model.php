<?php

class Model
{
    protected $db;

    /**
     * Connect to database
     */
    public function __construct()
    {
        $this->db = new Database();
    }
}