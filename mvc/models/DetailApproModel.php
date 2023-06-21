<?php 
class DetailApproModel extends Model{
    public int $id;
    public int $qteAppro;
    public int $approID;
    public int $articleID;
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName="detailAppro"; 
    }
}