<?php

class Index {
    public $data = array();
    public $errors = array();
    
    public function index(){
        $this->data['pg_title'] = 'home';
        $this->data['og_title'] = 'Site';
        
        //lang
        $lang_workflow = new \UserWorkflow\LangWorkflow();
        $resp_lang = $lang_workflow->getLangs();
        if($resp_lang->code){
            $this->data['languages'] = $resp_lang->body;
        }
        //events
        $events_workflow = new \UserWorkflow\EventWorkflow();
        $resp_events = $events_workflow->getEventSlider();
        if($resp_events->code){
            $this->data['events'] = $resp_events->body;
        }
        //experiences
        $exp_workflow = new \UserWorkflow\ExperienceWorkflow();
        $resp_exp = $exp_workflow->getExperiences();
        if($resp_exp->code){
            $this->data['experiences'] = $resp_exp->body;
        }
        //last added
        $last_workflow = new \UserWorkflow\EventWorkflow();
        $resp_last = $last_workflow->getLastAddedUI();
        if($resp_last->code){
            $this->data['last'] = $resp_last->body;
        }
        //categories
        $cat_workflow = new \UserWorkflow\CatWorkflow();
        $resp_cat = $cat_workflow->getCategories();
        if($resp_cat->code){
            $this->data['categories'] = $resp_cat->body;
        }
          //categories
        $post_workflow = new \UserWorkflow\PostWorkflow();
        $resp_post = $post_workflow->getPosts();
        if($resp_post->code){
            $this->data['posts'] = $resp_post->body;
        }
        
        
        load('ui/header',$this->data);
        load('ui/slider',$this->data);
        load('ui/experience_index',$this->data);
        load('ui/azerbaijan_index',$this->data);
        load('ui/top_index',$this->data);
        load('ui/footer',$this->data);
        
    }
    
    public function lang($lang){
        
            if(isset($lang) && !empty($lang) ){
                $model = new \Models\LangModel;
                $model->lang_id = intval($lang);
                $lang_workflow = new \UserWorkflow\LangWorkflow();
                $resp = $lang_workflow->getLang($model);
                if($resp->code){
                    $_SESSION['lang'] = $resp->body->lang_shortcode;
                    $_SESSION['lang_id'] = $resp->body->lang_id;
                   
                }else{
                    $_SESSION['lang'] = "EN";
                    $_SESSION['lang_id'] = 1;
                }
                
            }
        
    }
    
    
}

