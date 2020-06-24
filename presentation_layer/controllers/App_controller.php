<?php
class App{
    public $data = array();
    public $errors = array();
    
    public function askregister(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(!empty(file_get_contents("php://input"))){
                $data = json_decode(file_get_contents("php://input"),true);
                $cm = new \Models\UI\CustomerModel;
                $workflow = new \UserWorkflow\CustomerWorkflow;
                $cm->created_at = time();
                $cm->email = $data['email'];
                $cm->first_name = $data['firstName'];
                $cm->last_name = $data['lastName'];
                $cm->mobile = $data['mobile'];
                $cm->password = md5($data['password']);
                $cm->vin_code = $data['vincode'];
                $resp = $workflow->askregister($cm);
                if($resp->code){
                    $resp_json['resp'] = $resp->msg;
                }else{
                    $resp_json['resp'] = $resp->msg; 
                }

                header("Content-Type: application/json");
                echo json_encode($resp_json);

            }
         }
        
        
    }
    
    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(!empty(file_get_contents("php://input") )){
                $json = json_decode(file_get_contents("php://input"),true);
                $mail = $json['mail'];
                $pass = $json['pass'];
                $cm = new \Models\UI\CustomerModel;
                $workflow = new \UserWorkflow\CustomerWorkflow;
                $cm->email = $mail;
                $cm->password = $pass;
                $resp = $workflow->login($cm);
                echo json_encode($resp->body);
                
            }
            
        }
    }
}
