<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function select($table,$columns=[])
    {
        if ($columns != null){
            $columns = implode(",",$columns);
        }else{
            $columns = '*';
        }

        $statement = $this->pdo->prepare("select {$columns} from {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function find($table,$id)
    {
        $statement = $this->pdo->prepare("select * from {$table} where id={$id}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);

            //return true;
            header("location: index.php");

        } catch (\Exception $e) {

            return false;

        }
    }

    public function update($table, $parameters, $id)
    {
        $param ='';
        foreach ($parameters as $key => $value) {
            $param .= $key.'=:'.$key.',';
        }

        $sql = sprintf(
            'update %s set %s where %s',
            $table,
            substr($param,0,-1),
            'id='.$id
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
            
            header("location: index.php");

        } catch (\Exception $e) {

            return false;

        }
    }

    public function delete($table,$id)
    {
        $sql = sprintf('delete from %s where id=:id',$table);
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id'=>$id]);

        header("location: index.php");
    }
}
