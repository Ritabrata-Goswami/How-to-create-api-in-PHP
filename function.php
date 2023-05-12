<?php
class crud_api
{
    public $hostname;
    public $username;
    public $password;
    public $dbname;

    function __construct($hostname, $username, $password, $dbname)
    {
        $this->conn = mysqli_connect($hostname, $username, $password, $dbname);
        if(!$this->conn)
        {
            echo 'Database can not connected! '.mysqli_connect_error();
            exit();
        }
    }

    function insert($sql_stmt)
    {
        return mysqli_query($this->conn, $sql_stmt);
    }

    function select($sql_stmt)
    {
        return mysqli_query($this->conn, $sql_stmt);
    }

    function fetch_update_data($sql_stmt)
    {
        return mysqli_query($this->conn, $sql_stmt);
    }

    function save_update_data($sql_stmt)
    {
        return mysqli_query($this->conn, $sql_stmt);
    }

    function delete($sql_stmt)
    {
        return mysqli_query($this->conn, $sql_stmt);
    }
}
?>