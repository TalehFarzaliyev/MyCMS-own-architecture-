<?php
namespace Repository;

use Entity\CustomerEntity;
use Entity\ResultEntity;

require_once 'core/Database.php';

class CustomerRepository {

    public $db;
    private $data = array();

    function __construct() {
        $this->db = \Database::getDB();
    }
    
    public function askRegister(CustomerEntity $ce){
        $results = new ResultEntity();
        $query = $this->db->prepare("INSERT INTO `customers`(`FIRST_NAME`, `LAST_NAME`, "
                . "`EMAIL`, `VIN_CODE`, `MOBILE`, `PASSWORD`, `CREATED_DATE`) VALUES (?,?,?,?,?,?,?)");
          $query->execute(array($ce->first_name,$ce->last_name,$ce->email,$ce->vin_code,$ce->mobile,$ce->password,$ce->created_at));
           
        if($query->errorInfo()[1]==1062){
            $results->code = false;
            $results->msg = 1062;
        }else{
            $results->code = true;
            $results->msg = 1000;
        }
        return $results;
    }
    
    public function login(CustomerEntity $ce){
        $results = new \Entity\ResultEntity();
        $query = $this->db->prepare("SELECT * FROM `customers` WHERE `EMAIL`=? AND  `PASSWORD`=?");
        $query->execute(array($ce->email,$ce->password ));
           
        if($query->errorInfo()[1]==''){
            if($query->rowCount()>0){
                $fetch = $query->fetch();
                if($fetch['IS_ACTIVE']==1){
                    $token = md5(randomString());
                    $insert_token = $this->db->prepare("INSERT INTO `tokens`(`TOKEN`, `USER_ID`, `CREATED_DATE`, `EXP_DATE`) VALUES (?,?,?,?)");
                    $insert_token->execute(array($token,$fetch['CUSTOMER_ID'],time(),strtotime("+1 month")));
                    if($insert_token->errorInfo()[1]==''){
                        $response['code'] = "1000"; //success
                        $response['token']= $token;
                        $results->body = $response;
                    }
                    
                    
                }else{
                    $response['code'] = "1003"; //customer is not active
                    $response['token']= NULL;
                    $results->body = $response;
                }
                
            }else{
                $response['code'] = "1002"; //not found
                $response['token']= NULL;
                $results->body = $response;
            }
            
        }else{
            $results->code = true;
            $results->msg = 1001;
        }
        return $results;
    }
}