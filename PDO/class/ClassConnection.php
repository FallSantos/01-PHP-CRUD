<?php
/**
 * Created by PhpStorm.
 * User: FALL
 * Date: 14/08/2018
 * Time: 09:34
 */

abstract class ClassConnection
{
    # Conexão com o banco
    protected function connect_db()
    {
        try{
            $conn = new \PDO("mysql:host=localhost;dbname=db_teste","root","root");

            return $conn;

        }catch (PDOException $erro){

            return $erro->getMessage();

        }
    }
}