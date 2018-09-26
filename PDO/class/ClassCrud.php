<?php
/**
 * User: FALL
 * Date: 14/08/2018
 * Time: 12:23
 */

include ("ClassConnection.php");

class ClassCrud extends ClassConnection
{
    # Atributos
    private $crud;
    private $count;

    # Preparação das declarativas - preparação das querys
    public function preparedStatements($query, $params)
    {
        $this->countParams($params);// Conta os parâmetros ↑↑

        $this->crud = $this->connect_db()->prepare($query);# Prepara a query

        if($this->count > 0)# Se ouver parâmetros / (select * from)<- não tem parâmetros
        {
            for($i = 1; $i <= $this->count; $i++){
                $this->crud->bindValue($i, $params[$i-1]);# porque arrays começam com 0*
                //                ↑↑↑ Associa um valor a um parÂmetro / envia os bindValues de acordo com a quantidade de parâmetros
            }
        }
        #se for (select * from), passa direto pro execute() ↓↓↓
        $this->crud->execute(); # Executa a inserção
    }

    # Contador de parâmetros
    private function countParams($params)
    {
        $this->count = count($params);
    }

    # Insert
    public function insert($table, $condition, $params) # A tabela, as condição e os parâmetros
    {
        $this->preparedStatements("INSERT INTO {$table} VALUES({$condition})", $params);# Envia a query e os parâmetros para a função preparedStatement ↑↑

        return $this->crud;
    }

    # Select
    public function select($fields, $table, $condition, $params) # A tabela, as condição e os parâmetros
    {
        $this->preparedStatements("SELECT {$fields} FROM {$table} {$condition}", $params);

        return $this->crud;
    }

    # Update
    public function update($table, $set, $condition, $params) # A tabela, as condição e os parâmetros
    {
        $this->preparedStatements("UPDATE {$table} SET {$set} WHERE {$condition}", $params);

        return $this->crud;
    }

    # Delete
    public function delete($table, $condition, $params) # A tabela, as condição e os parâmetros
    {
        $this->preparedStatements("DELETE FROM {$table} WHERE {$condition}", $params);

        return $this->crud;
    }
}