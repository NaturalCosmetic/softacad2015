<?php

class Product
{
    public $title = 'test';

    public function add($data)
    {
        $db = new DB();
        return $db->insert('products', $data);
    }
}
