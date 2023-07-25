<?php
class DB{

    public function connect($userName, $password){
        try{
            $dns = 'mysql:dbname=formdb;host=localhost;port=3306';

            $db = new PDO($dns, $userName, $password);

            return $db;
        }
        catch(Exception $e){
            echo "Can't Connect <br>". $e->getMessage();  
            exit;
        }
        
    }

    public function insert($db, $table, $user){
       try{
            $sql ="insert into $table(";
            foreach ($user as $key => $value) {
                $sql .= $key . ", ";
            }
            $sql=rtrim($sql,", "); //remove last comma and space from string
            $sql.= ") VALUES(";
            foreach ($user as $key => $value) {
                $sql .= ":".$key . ", ";
                //$sql .= "?, ";
            }
            $sql=  rtrim($sql,", "); //remove last comma and space from string
            $sql.=");";

            //var_dump($sql);

            $stmt = $db->prepare($sql);
            $i=1;
            foreach ($user as $key => $value) {
                $key= ":".$key;
                $stmt-> bindParam($key,$value);
                $i++;
                
            }
            
            $stmt->execute();
            //var_dump($stmt->execute());
        }
        catch(Exception $e){
            echo "Can't insert: " . $e->getMessage();  
            exit;
        }
       
        
    }
    public function select($db, $tableName, $id){
        try{
            $sql="SELECT * FROM ".$tableName." where id=:id ;";
            $stmt = $db->prepare($sql);
            $stmt-> bindParam(':id',$id);

            $stmt->execute();

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
        catch(Exception $e){
                 echo "Can't Select <br>. $e->getMessage()";  
            exit;
        }
    }
    public function selectAllUsers($db, $tableName){
        try{
            $sql="SELECT * FROM ".$tableName." ORDER BY id ;";
            $stmt = $db->prepare($sql);

            $stmt->execute();

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
        catch(Exception $e){
                echo "Can't Select <br>". $e->getMessage();  
            exit;
        }
    }


    public function delete($db , $table, $id){
        try{
            $sql ="delete from $table WHERE id=:id";
            $stmt = $db->prepare($sql);
            $stmt-> bindParam(':id',$id);

            $stmt->execute();
        }
        catch(Exception $e){
            echo "Can't delete: " . $e->getMessage();  
            exit;
        }
    }

    public function update($db , $table, $user, $id){
        try{
            $sql ="update $table set ";
            foreach ($user as $key => $value) {
                $sql .= $key ."=:".$key. ", ";
            }
            $sql=rtrim($sql,", "); //remove last comma and space from string
            $sql.=" where id=:id;";

            var_dump($sql);
            $stmt = $db->prepare($sql);

            foreach ($user as $key => $value) {
                $stmt-> bindParam(":".$key,$value);;
            }
           
            $stmt-> bindParam(':id',$id);
                
            $stmt->execute();
        }
        catch(Exception $e){
            echo "Can't update: " . $e->getMessage();  
            exit;
        }
    }



}
?>