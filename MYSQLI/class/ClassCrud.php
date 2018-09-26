<?php
/**
 * Created by PhpStorm.
 * User: FALL
 * Date: 14/08/2018
 * Time: 13:20
 */

include ("ClassConnection.php");

class ClassCrud extends ClassConnection
{
    # Atributos
    private $crud;
    private $count;
    private $result;

    # Preparação das declarativas
    private function preparedStatements($query, $types, $params)
    {
        $this->countParams($params);// Conta os parâmetros

        $conn = $this->connect_db();         # Primeiro recebe a conexão
        $this->crud = $conn->prepare($query);# Depois prepara a query

        if($this->count > 0)
        {
            $callParams = array();

            foreach ($params as $key => $param)
            {
                $callParams[$key] = &$params[$key];
            }

            array_unshift($callParams, $types);# insere na primeira posição do array os tipos, que são necessários no bindParam

            call_user_func_array(array($this->crud,'bind_param'), $callParams);// mysqli não tem bindValue
        }

        $this->crud->execute();
        $this->result = $this->crud->get_result();
    }

    # Contador de parâmetros
    private function countParams($params)
    {
        $this->count = count($params);// Conta os parâmetros
    }

    # Insert
    public function insert($table, $condition, $types, $params)
    {
        $this->preparedStatements("INSERT INTO {$table} VALUES ({$condition})", $types, $params);

        return $this->crud;
    }

    # Select
    public function select($fields, $table, $condition, $types, $params)
    {
        $this->preparedStatements("SELECT {$fields} FROM {$table} {$condition}", $types, $params);

        return $this->result;
    }

    #Update
    public function update($table, $fields, $condition, $types, $params)
    {
        $this->preparedStatements("UPDATE {$table} SET {$fields} WHERE {$condition}", $types, $params);

        return $this->result;
    }

    #delete
    public function delete($table, $condition, $types, $params)
    {
        $this->preparedStatements("DELETE FROM {$table} WHERE {$condition}", $types, $params);

        return $this->crud;
    }
}