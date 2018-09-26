<?php
/**
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

            $conn = new mysqli("localhost","root","root","db_teste");

            return $conn;

        }catch (Exception $erro){

            return $erro->getMessage();

        }finally{

            $conn = null;

        }
    }
}