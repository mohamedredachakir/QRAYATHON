

<?php 

class borrow {
    public $id;
    public $userid;
    public $bookid;
    public $borrowdate;
    public $returndate;

    public function __construct($id,$userid,$bookid,$borrowdate,$returndate)
    {
        $this->id = $id;
        $this->userid = $userid;
        $this->bookid = $bookid;
        $this->borrowdate = $borrowdate;
        $this->returndate = $returndate;
    }
}

?>