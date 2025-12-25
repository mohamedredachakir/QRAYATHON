

<?php 

class book {
    public $id;
    public $title;
    public $author;
    public $status;

    public function __construct($id,$title,$author,$status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->status = $status;
    }
}
?>