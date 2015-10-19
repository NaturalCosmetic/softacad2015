<?php

class DB
{
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'softacad';

    private $db;

    public function __construct()
    {
        $this->db = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);
    }

    /**
     * @param $table
     * @param $where
     * @return array
     */
    public function getOne($table, $where = array())
    {
        // SELECT * FROM {TABLE} WHERE username = {USERNAME}
        $sql = "SELECT * FROM `{$table}` WHERE 1=1";

        foreach ($where as $column => $value) {
            $sql .= " AND `{$column}` = '{$value}'";
        }

        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_assoc($result);
    }

    /**
     * @param $table
     * @param int $limit
     * @param int $offset
     * @return array
     */
    public function get($table, $limit = -1, $offset = 0)
    {
        $sql = "SELECT * FROM {$table}";

        if ($limit > -1) {
            $sql .= " LIMIT {$offset}, {$limit}";
        }

        $result = mysqli_query($this->db, $sql);

        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function insert($table, $data)
    {
        // INSERT INTO {TABLE} (`col1`, `col2`, `col3`) VALUES (val1, val2, val3);

        $sql = "INSERT INTO `{$table}` ";
        $sql .= '(`' . implode('`, `', array_keys($data)) . '`)';
        $sql .= ' VALUES ';
        $sql .= "('" . implode("', '", array_values($data)) . "')";

        $result = mysqli_query($this->db, $sql);

        if ($result === false) {
            $this->error();
        }

        return mysqli_insert_id($this->db);
    }

    /**
     * @param $table
     * @param $data
     * @param $id
     */
    public function update($table, $data, $id)
    {
        // UPDATE {TABLE} SET `name` = 'Engine oil', `price` = 145 WHERE id = {ID};

        $sql = "UPDATE `{$table}` SET ";
        $parts = array();

        foreach ($data as $column => $value) {
            $parts[] = "`{$column}` = '{$value}'"; // `name` = 'Engine oil'
        }

        $sql .= implode(', ', $parts);

        $sql .= " WHERE `id` = {$id}";

        $result = mysqli_query($this->db, $sql);

        if ($result === false) {
            $this->error();
        }
    }

    /**
     * @param $table
     * @param $id
     */
    public function delete($table, $id)
    {
        // DELETE FROM {TABLE} WHERE id = {ID}

        $sql = "DELETE FROM `{$table}` WHERE `id` = '{$id}'";
        $result = mysqli_query($this->db, $sql);

        if ($result === false) {
            $this->error();
        }
    }

    private function error()
    {
        die('<strong style="color:red">'.mysqli_error($this->db).'</strong>');
    }
}
