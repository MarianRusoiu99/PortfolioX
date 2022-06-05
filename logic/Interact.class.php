
<?php   

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class Interact extends Dbc
{

    //POST
    public function getIdFromTitle($title)
    {
        $sql = "SELECT post_id FROM POST where title = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title]);
        return $stmt->fetch();
    }

    public function getPosts()
    {
        $sql = "SELECT * FROM POST";
        $stmt = $this->connect()->query($sql);
        while ($row=$stmt->fetch()) {
            echo $row['title'].'<br>';
        }
    }

    public function insertPost($title, $content)
    {
        $sql = "INSERT INTO POST (title,content) VALUES(?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title,$content]);
    }
    
    public function deletePost($post_id)
    {
        $sql = "DELETE FROM POST WHERE POST_id = ?";
        $sqlimg = "DELETE FROM IMG WHERE pkey = ?";

        $stmt = $this->connect()->prepare($sql);
        $stmtimg = $this->connect()->prepare($sqlimg);
        $stmt->execute([$post_id]);
        $stmtimg->execute([$post_id]);
    }
    //IMG
    public function getAllImg()
    {
        $sql = "SELECT fname FROM IMG";
        $stmt = $this->connect()->query($sql);
        $arr = [];
        while ($row=$stmt->fetch()) {
            $arr[] = $row ;
        }

        return $arr;
    }

    public function getImg($pkey)
    {
        $sql = "SELECT * FROM IMG where pkey = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pkey]);
    }
    public function insertImg($fname, $fpath, $pkey)
    {
        $sql = "INSERT INTO IMG (fname,fpath,pkey) VALUES(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fname,$fpath,$pkey]);
    }
    public function deleteImg($img_id)
    {
        $sql = "DELETE FROM IMG WHERE img_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$img_id]);
    }

    //USER
    public function insertUser($username, $pass, $email)
    {
        $sql = "INSERT INTO user (username,pass,email) VALUES(?,?,?)";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username,md5($pass.$username),$email]);
    }
    public function deleteUser($usr_id)
    {
        $sql = "DELETE FROM user WHERE usr_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$usr_id]);
    }
    public function getUser($user){
        $sql = "SELECT * FROM  user WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);
        return $stmt->fetch();

    }  
    public function getAllUsers(){
        $sql = "SELECT * from USER";
        $usrarr=[];
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch()){
            $usrarr[] = $row['username'] ;
        }
        return $usrarr;
    }
    public function getAllEmails(){
        $sql = "SELECT * from USER";
        $emlarr=[];
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch()){
            $emlarr[] = $row['email'] ;
        }
        return $emlarr;
    }      


   

    //micelanious
    public function fetchPost(){
        $sql = "SELECT * FROM POST";
        
        $arr = [];
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch()){
            $sql2 = "SELECT * FROM IMG where pkey = ".$row['post_id'] ;
            $stmt2 = $this->connect()->query($sql2);
            //$row['img'] = $stmt2->fetch();
            
            while($img = $stmt2->fetch()){
                $row['img'][] = $img;
                //print_r($img);
            }
            $arr[] = $row;

        }
        
        return $arr;
    }


}



?>
