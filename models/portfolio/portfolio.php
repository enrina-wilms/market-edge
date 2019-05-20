<?php
require_once '../../config_test.php';
require_once 'database.php';
require_once '../../userSession.php';

class Portfolio{   
    //get portfolio function
    public function getPortfolio($dbcon, $userid){   
        //sql query where active user id
        $sql = "SELECT * FROM portfolio WHERE USER_ID = ". $userid;
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchAll(PDO::FETCH_OBJ);
    }
    //add ticker function
    public function addTicker($dbcon, $ticker, $company, $shares, $price, $userid){
        $sql = "INSERT INTO portfolio (ticker, company, shares, price, user_id) values (:ticker, :company, :shares, :price, :userid)";
    
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':ticker', $ticker);
        $pdostm->bindParam(':company', $company);
        $pdostm->bindParam(':shares', $shares);
        $pdostm->bindParam(':price', $price);
        $pdostm->bindParam(':userid', $userid);
        $count = $pdostm->execute();
    }
    //edit ticker function
    public function editTicker($dbcon, $id, $ticker, $company, $shares, $price, $user_id){
        $sql = "UPDATE portfolio
        SET ticker = :ticker, company = :company, shares = :shares, price = :price, user_id = :user_id
        WHERE id = :id";
                
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->bindParam(':ticker', $ticker);
        $pdostm->bindParam(':company', $company);
        $pdostm->bindParam(':shares', $shares);
        $pdostm->bindParam(':price', $price);
        $pdostm->bindParam(':user_id', $user_id);
        $count = $pdostm->execute();
        
        return $count;
    }
    //delete ticker function
    public function deleteTicker($dbcon, $id){
        $sql = "DELETE FROM portfolio WHERE id= :id";
                
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        
        return $count;
    }
}   