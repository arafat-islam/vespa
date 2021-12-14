<?php
class Database {
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct() {
        $this->connectDB();
    }


    private function connectDB () {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if (!$this->link) {
            $this->error = "Connection Failed" . $this->link->connect_error;

            return $this->error;
        }
    }


    //Select Data
    public function select ($query) {
        $result = $this->link->query($query) OR die ($this->link->error.__LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


  //Insert Data
  public function insert ($query) {
    $result = $this->link->query($query) OR die ($this->link->error.__LINE__);
    if ($result) {
        return true;
    } else {
        die ("Error : (".$this->link->errno.")" . $this->link->error);
    }
 }


  //Update Data
  public function update ($query) {
    $result = $this->link->query($query) OR die ($this->link->error.__LINE__);
    if ($result) {
        return true;
    } else {
        die ("Error : (".$this->link->errno.")" . $this->link->error);
    }
}


  //Delete Data
  public function delete ($query) {
    $result = $this->link->query($query) OR die ($this->link->error.__LINE__);
    if ($result) {
        return true;
    } else {
        die ("Error : (".$this->link->errno.")" . $this->link->error);
    }
}




}