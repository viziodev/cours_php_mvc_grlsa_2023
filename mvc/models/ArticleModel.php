<?php 
class ArticleModel extends Model{
    protected int $id;
    protected string $libelle;
    protected float $prixAchat;
    protected int $qteStock;
    protected string $type;


    public function __construct()
    {
        parent::__construct();
        $this->tableName="article"; 
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of prixAchat
     */ 
    public function getPrixAchat()
    {
        return $this->prixAchat;
    }

    /**
     * Set the value of prixAchat
     *
     * @return  self
     */ 
    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    /**
     * Get the value of qteStock
     */ 
    public function getQteStock()
    {
        return $this->qteStock;
    }

    /**
     * Set the value of qteStock
     *
     * @return  self
     */ 
    public function setQteStock($qteStock)
    {
        $this->qteStock = $qteStock;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    
    public function insert($data):int{
        $sql="INSERT INTO $this->tableName  VALUES (NULL,:libelle,:prixAchat,:qteStock,:type,:fournisseur, :dateProduction,:categorieId) ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute(["libelle"=>$this->libelle,
                         "prixAchat"=>$this->prixAchat, 
                         "qteStock"=>$this->qteStock, 
                         "type"=>$this->type,
                         "fournisseur"=>$this->type=='ArticleConfection'?$data: null,
                         "dateProduction"=>$this->type=='ArticleVente'?$data: null,
                        ]);
        return $stmt->rowCount();
    }

    public function update():int{
        //A Faire
        return 0;
    }

     public function findAll():array{
        $sql="select * from $this->tableName  where  type  like '$this->type' ";  //Requete Non preparee
        $stmt= $this->pdo->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_CLASS,get_called_class()); 
    }
}