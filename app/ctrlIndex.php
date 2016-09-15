<?php
 class ctrlIndex extends ctrl {
     function index(){
      $this->posts =  $this->db->query('SELECT * FROM post ORDER BY ctime DESC ')->all();
         $this->out('posts.php');
     }

     function login(){
         if(!empty($_POST)){
            $user= $this->db->query("SELECT * FROM admins WHERE email =? AND pass = ?",$_POST['email'],md5($_POST['pass']))->assoc();
            if($user) {
                $key =md5(microtime().rand(0,10000));
                setcookie("uid",$user['id'],time()+86400*30, '/');
                setcookie("key",md5($key),time()+86400*30, '/');
                $this->db->query("UPDATE admins SET cookie = ? WHERE id = ?", $key,$user['id']);
                header('Location: /');

            }else{
                $this->error = "Неправильный емейл или пароль";
            }


        }
         $this->out('login.php');
     }

     function logoff(){

         setcookie("uid",'',0, '/');
         setcookie("key",'',0, '/');
         return  header('Location: /');

     }
     function add(){
         if(!$this->user)
             return  header('Location: /');
         if (!empty($_POST)){
             $this->db->query("INSERT INTO post(title,post,ctime) VALUES(?,?,?)",htmlspecialchars($_POST['title']),$_POST['post'],time());
             header('Location: /');
         }


         $this->out('add.php');
     }

     function del($id){
         if(!$this->user)
             return  header('Location: /');
         $this->db->query("DELETE FROM post WHERE id=?",$id);
         header("Location: /");
     }
     function edit($id){
         if($this->user) return header('Location: /');
         if (!empty($_POST)){
             $this->db->query("UPDATE post SET title=?, post =? WHERE id =?", htmlspecialchars($_POST['title']),$_POST['post'],$id);
             return header("Location: /");
         }
       $this->post = $this->db->query("SELECT * FROM post WHERE id=?",$id)->assoc();
        $this->out('add.php');
     }
     function post($id){
         $this->post =$this->db->query("SELECT * FROM post WHERE id=?",$id)->assoc();
         $this->comments =$this->db->query("SELECT * FROM comment WHERE postid=? ORDER BY id DESC ",$id)->all();
        $this->out('post.tpl');
     }
     function addComment($postid){
         $this->db->query("INSERT INTO comment(postid,name,post) VALUES(?,?,?)",$postid, htmlspecialchars($_POST['name']),htmlspecialchars($_POST['post']));
        header("Location: /?post/".intval($postid));
     }

     function delComment($commId,$postid){
         if($this->user) return header('Location: /');

         $this->db->query("DELETE FROM coment WHERE id =?", $commId);
         header("Location: /?post/".intval($postid));
     }

 }