<?php
   require_once '../../config_test.php';
   require_once 'database.php';

class Watchlist{
    public function getwatchlist($dbcon){        
        $sql = "SELECT * FROM watchlist";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchAll(PDO::FETCH_OBJ);
    }
    public function addTicker($ticker, $company, $dbcon, $userid){
        $sql = "INSERT INTO watchlist (company, ticker, user_id) values (:company, :ticker, :userid)";
    
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':ticker', $ticker);
        $pdostm->bindParam(':company', $company);
        $pdostm->bindParam(':userid', $userid);
        $count = $pdostm->execute();
    }
    
    public function deleteTicker($dbcon, $id){
        $sql = "DELETE FROM watchlist WHERE id= :id";
                
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        
        return $count;
    }
}   