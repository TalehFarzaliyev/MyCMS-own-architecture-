<?php

namespace UserWorkflow;
use Entity\LangEntity;
use Entity\ResultEntity;
use Repository\LangRepository;
use Models\LangModel;

class LangWorkflow {

    public $data = array();

    public function getLangs() {
        $resultModel = new \Models\ResultModel;
        $repo = new \Repository\LangRepository();
        $resp = $repo->getLangs();
        if ($resp->code) {
            $resultModel->code = $resp->code;
            $resultModel->body = $resp->body;
        } else {
            $resultModel->code = $resp->code;
        }
        return $resultModel;
    }

    public function addLang(LangModel $lm) {
        $resultModel = new \Models\ResultModel;
        $repo = new \Repository\LangRepository;
        $le = new \Entity\LangEntity();
        $le->lang_shortcode = $lm->lang_shortcode;
        $resp = $repo->addLang($le);
        if ($resp->code) {
            $resultModel->code = $resp->code;
        } else {
            $resultModel->code = $resp->code;
            $resultModel->msg = $resp->msg;
        }
        return $resultModel;
    }

    public function getLang(Langmodel $lm) {
        $resultModel = new \Models\ResultModel();
        $repo = new \Repository\LangRepository();
        $le = new \Entity\LangEntity();
        $le->lang_id = $lm->lang_id;
        $resp = $repo->getLang($le);
        if ($resp->code) {
            $lm->lang_shortcode = $le->lang_shortcode;
            $resultModel->code = true;
            $resultModel->body = $resp->body;
            
        } else {
            $resultModel->code = false;
            $resultModel->msg = $resp->msg;
        }
        return $resultModel;
    }

    public function updateLang(Langmodel $lm) {
        $resultModel = new \Models\ResultModel();
        $repo = new \Repository\LangRepository();
        $le = new \Entity\LangEntity();
        $le->lang_id = $lm->lang_id;
        $le->lang_shortcode = $lm->lang_shortcode;
        $result = $repo->updateLang($le);
        if ($result->code) {
            $resultModel->code = true;
            $resultModel->msg = $result->msg;
        } else {
            $resultModel->code = false;
            $resultModel->msg = $result->msg;
        }
        return $resultModel;
    }

    public function deleteLang(LangModel $lm) {
        $resultModel = new \Models\ResultModel;
        $repo = new \Repository\LangRepository;
        $le = new \Entity\LangEntity;
        $le->lang_id = $lm->lang_id;
        $deleteResp = $repo->deleteLang($le);
        if ($deleteResp->code) {
            $resultModel->msg = $deleteResp->msg;
            $resultModel->code = true;
        } else {
            $resultModel->code = false;
            $resultModel->msg = $deleteResp->msg;
        }
        return $resultModel;
    }

}
