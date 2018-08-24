<?php

abstract class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog-projet4;charset=utf8', 'root', 'root');
        return $db;
    }
}