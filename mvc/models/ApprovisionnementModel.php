<?php 
class ApprovisionnementModel extends Model{
   public int $id; 
   public string $date; 
   public float $montant; 
   public bool $payer; 
    public function __construct()
    {
        parent::__construct();
        $this->tableName="approvisionnement"; 
    }
}