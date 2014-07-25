<?php
Class LinkDB
{
    private $dbHandle;

    public function __construct()
    {
        $this->dbHandle = new PDO("sqlite:/var/databases/newtab/newtab.sqlite");
    }
    public function get_ordered()
    {
        $result = $this->dbHandle->query("SELECT * FROM links ORDER BY arrange ASC");
        return $result->fetchAll();
    }
    public function update_link($title, $url, $img, $id, $arrange)
    {
        $result = $this->dbHandle->exec("UPDATE links SET title='$title', url='$url', img='$img', arrange='$arrange' WHERE id = '$id'");
        $this->error_handle($result);
    }
    public function delete_link($id)
    {
        $result = $this->dbHandle->exec("DELETE from links WHERE id = '$id'");
        $this->error_handle($result);
    }
    public function insert_link($title, $url, $img, $arrange)
    {
        $result = $this->dbHandle->exec("INSERT INTO links (title,url,img,arrange) VALUES ('$title','$url','$img','$arrange')");
        $this->error_handle($result);
    }
    public function get_img_url($id)
    {
        $result = $this->dbHandle->query("SELECT img FROM links WHERE id = '$id'");
        return $result->fetchAll()[0][0];
    }
    private function error_handle($result)
    {
        if (!$result)
        {
            echo "\nPDO::errorInfo():<br>";
            print_r($dbHandle->errorInfo());
        }
    }

}
