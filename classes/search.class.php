<?php

class Search extends Conn{
  public function getSearch($search){
    $sql = "SELECT hname, hlvl FROM hospital WHERE hname ILIKE :search"; 
    echo "The code is here";
    $stmt = $this->connect()->prepare($sql); 
    $stmt->execute(['search' => '%' . $search . '%']); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}