<?php
require_once('../Models/db.php');
session_start();
class Dbc extends Db
{
    protected $dbh;
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    // データ取得
    public function findAll()
    {
        try {
            $this->dbh-> beginTransaction();
            $sql = "SELECT * FROM contacts";
            $stmt = $this->dbh-> query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->dbh->commit();
        } catch (PDOException $e) {
            $this->dbh->rollBack();
            echo '接続失敗'.$e->getMessage();
            exit();
        };

        return $result;
    }

    // データ挿入
    public function create()
    {
        $name = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
        $kana = htmlspecialchars($_SESSION['kana'], ENT_QUOTES, 'UTF-8');
        $tel = htmlspecialchars($_SESSION['tel'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
        $body = htmlspecialchars($_SESSION['body'], ENT_QUOTES, 'UTF-8');
        try {
            $this -> dbh -> beginTransaction();
            $stmt = $this -> dbh -> prepare(
                'INSERT INTO 
                    contacts(name,kana,tel,email,body) 
                VALUES
                    ("'.$name.'","'.$kana.'","'.$tel.'","'.$email.'","'.$body.'")'
                );
            $stmt -> execute();
            $this-> dbh -> commit();
        } catch (PDOException $e) {
            $this -> dbh -> rollBack();
            echo '接続失敗'.$e -> getMessage();
            exit();
        };
    }

    // データ更新
    public function update()
    {
        $_SESSION["id"] = htmlspecialchars($_POST['id'], ENT_QUOTES, "UTF-8");
        $_SESSION["name"] = htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
        $_SESSION["kana"] = htmlspecialchars($_POST['kana'], ENT_QUOTES, "UTF-8");
        $_SESSION["tel"] = htmlspecialchars($_POST['tel'], ENT_QUOTES, "UTF-8");
        $_SESSION["email"] = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
        $_SESSION["body"] = htmlspecialchars($_POST['body'], ENT_QUOTES, "UTF-8");
        try {
            $this -> dbh -> beginTransaction();
            $stmt = $this -> dbh -> prepare('UPDATE contacts SET name = :name, kana = :kana,
            tel = :tel, email = :email, body = :body WHERE id = :id');
            $stmt->bindParam(':id', $_SESSION["id"], PDO::PARAM_INT);
            $stmt->bindParam(':name', $_SESSION['name'], PDO::PARAM_STR);
            $stmt->bindParam(':kana', $_SESSION['kana'], PDO::PARAM_STR);
            $stmt->bindParam(':tel', $_SESSION['tel'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
            $stmt->bindParam(':body', $_SESSION['body'], PDO::PARAM_STR);
            $stmt->execute();
            $this -> dbh -> commit();
        } catch (PDOException $e) {
            $this -> dbh -> rollBack();
            echo '接続失敗'.$e->getMessage();
            exit();
        };
    }

    // データ削除
    public function delete()
    {
        $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
        try {
            $this -> dbh -> beginTransaction();
            $stmt = $this -> dbh -> prepare('DELETE FROM contacts WHERE id = :id');
            $stmt -> bindParam(':id', $id);
            $stmt -> execute();
            $this -> dbh -> commit();
            header('Location: contact.php');
        } catch (PDOException $e) {
            $this -> dbh -> rollBack();
            echo '削除失敗'.$e -> getMessage();
            exit();
        };
    }


}