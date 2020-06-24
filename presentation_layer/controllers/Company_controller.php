<?php

use Repository\UserRepository;
use Repository\LangRepository;
use Repository\TipRepository;
use Repository\RegionRepository;
use Repository\CatRepository;
use Repository\ExperienceRepository;
use Repository\PostRepository;
use Repository\EventRepository;
//workflows
use AdminWorkflow\UserWorkflow;
use AdminWorkflow\LangWorkflow;
use AdminWorkflow\TipWorkflow;
use AdminWorkflow\RegionWorkflow;
use AdminWorkflow\CatWorkflow;
use AdminWorkflow\ExperienceWorkflow;
use AdminWorkflow\PostWorkflow;
use AdminWorkflow\EventWorkflow;
//models
use Models\TipModel;
use Models\UserModel;
use Models\LangModel;
use Models\RegionModel;
use Models\CatModel;
use Models\ExperienceModel;
use Models\PostModel;
use Models\EventModel;

class Company {

    public $data = array();
    public $errors = array();

    public function index() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
            $this->data['title'] = 'Dashboard';
            load('admin/header', $this->data);
            load('admin/dashboard', $this->data);
            load('admin/footer', $this->data);
        } else {
            header('Location:' . SITE_URL . 'admin/login/');
        }
    }

    //login 
    public function login() {
        $this->data['title'] = "Admin Login";
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {

            header('Location:' . SITE_URL . 'admin/index/');
        } else {

            //POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //email
                if (isset($_POST['email']) && !empty($_POST['email'])) {
                    $email = secure($_POST['email']);
                } else {
                    $this->errors[] = "Please fill out e-mail field";
                }
                //pass
                if (isset($_POST['password']) && !empty($_POST['password'])) {
                    $password = crocus_hash($_POST['password']);
                } else {
                    $this->errors[] = "Please fill out password field";
                }
                if (count($this->errors) == 0) {
                    $um = new \Models\UserModel();
                    $um->user_email = $email;
                    $um->user_pass = $password;
                    $workflow = new \AdminWorkflow\UserWorkflow();
                    $result = $workflow->login($um);


                    if ($result->code == true) {
                        $_SESSION['logged_in'] = 1;
                        $_SESSION['user_email'] = $um->user_email;
                        $_SESSION['user_id'] = $um->user_id;

                        header('Location:' . SITE_URL . 'admin/index');
                    } else {
                        $this->errors[] = $result->msg;
                        $this->data['errors'] = $this->errors;
                        load('admin/login', $this->data);
                    }
                } else {
                    $this->data['errors'] = $this->errors;

                    load('admin/header', $this->data);
                    load('admin/login', $this->data);
                }
            }
            //POST
            //GET

            load('admin/header_login', $this->data);
            load('admin/login');
            //GET
        }
    }

    //logout
    public function logout() {

        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_pass']);
        header('Location:' . SITE_URL . 'admin/login/');
    }

    //adduser
    public function adduser() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
            $this->data['title'] = 'Add User';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //email
                if (isset($_POST['email']) && !empty($_POST['email'])) {
                    $email = secure($_POST['email']);
                } else {
                    $this->errors[] = 'Enter any e-mail!';
                }
                //pass
                if (isset($_POST['pass']) && !empty($_POST['pass'])) {
                    $pass = crocus_hash($_POST['pass']);
                } else {
                    $this->errors[] = 'Enter any password!';
                }
                //repass
                if (isset($_POST['repass']) && !empty($_POST['repass'])) {
                    $repass = crocus_hash($_POST['repass']);
                    if ($pass != $repass) {
                        $this->errors[] = 'The passwords do not match';
                    }
                } else {
                    $this->errors[] = 'Please re-type password! ';
                }
                if (count($this->errors) > 0) {
                    $this->data['errors'] = $this->errors;
                    load('admin/header', $this->data);
                    load('admin/adduser', $this->data);
                    load('admin/footer', $this->data);
                } else {
                    $um = new \Models\UserModel;
                    $workflow = new \AdminWorkflow\UserWorkflow();
                    $um->user_email = $email;
                    $um->user_pass = $pass;
                    $resp = $workflow->addUser($um);
                    if ($resp->code) {
                        $this->data['success'] = 'User successfully added!';
                    } else {
                        $this->errors[] = $resp->msg;
                        $this->data['errors'] = $this->errors;
                    }

                    load('admin/header', $this->data);
                    load('admin/adduser', $this->data);
                    load('admin/footer', $this->data);
                }
            } else {
                load('admin/header', $this->data);
                load('admin/adduser', $this->data);
                load('admin/footer', $this->data);
            }
        } else {
            header('Location:' . SITE_URL . 'admin/login/');
        }
    }

    //update user
    public function updateuser($id) {
        $this->data['title'] = 'Update User';
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
            if (isset($id) && !empty($id)) {
                $id = intval(secure($id));
                $um = new \Models\UserModel();
                $workflow = new \AdminWorkflow\UserWorkflow();
                $um->user_id = $id;
                $result = $workflow->getUser($um);
                if ($result->code) {
                    $this->data['email'] = $result->body->user_email;
                } else {
                    $_SESSION['errors'] = $result->msg;
                    header('Location:' . SITE_URL . 'admin/users/');
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    //email
                    if (isset($_POST['email']) && !empty($_POST['email'])) {
                        $email = secure($_POST['email']);
                    } else {
                        $email = $result->body->user_email;
                    }
                    //pass
                    if (isset($_POST['pass']) && !empty($_POST['pass'])) {
                        $pass = crocus_hash($_POST['pass']);

                        if (isset($_POST['repass']) && !empty($_POST['repass'])) {

                            if ($_POST['repass'] != $_POST['pass']) {

                                $this->errors[] = 'The passwords do not match';
                            }
                        } else {
                            $this->errors[] = 'Please confirm the password!';
                        }
                    } else {
                        $pass = $result->body->user_pass;
                    }

                    if (count($this->errors) > 0) {
                        // echo '<script>alert(1)</script>';

                        $this->data['errors'] = $this->errors;

                        load('admin/header', $this->data);
                        load('admin/updateuser', $this->data);
                        load('admin/footer', $this->data);
                    } else {

                        $um->user_email = $email;
                        $um->user_pass = $pass;

                        $resultUpdate = $workflow->updateUser($um);
                        if ($resultUpdate->code) {
                            $this->data['success'] = $resultUpdate->msg;
                        } else {
                            $this->data['errors'] = $resultUpdate->msg;
                        }
                        load('admin/header', $this->data);
                        load('admin/updateuser', $this->data);
                        load('admin/footer', $this->data);
                    }
                }

                load('admin/header', $this->data);
                load('admin/updateuser', $this->data);
                load('admin/footer', $this->data);
            } else {
                $_SESSION['error'] = 'Invalid request!';
                header('Location:' . SITE_URL . 'admin/users/');
            }
        } else {
            header('Location:' . SITE_URL . 'admin/login/');
        }
    }

    //users
    public function users() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
            $this->data['title'] = 'Users';
            $workflow = new \AdminWorkflow\UserWorkflow();
            $resp = $workflow->getUsers();
            if ($resp->code) {
                $this->data['users'] = $resp->body;
            } else {
                $this->data['errors'] = $resp->msg;
            }
            load('admin/header', $this->data);
            load('admin/users', $this->data);
            load('admin/footer', $this->data);
        } else {
            header('Location:' . SITE_URL . 'admin/login/');
        }
    }

    //deleteuser
    public function deleteuser($id) {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
            if (isset($id) && !empty($id)) {
                $id = intval($id);
                $um = new \Models\UserModel();
                $um->user_id = $id;
                $workflow = new \AdminWorkflow\UserWorkflow();
                $resp = $workflow->deleteUser($um);
                if ($resp->code) {
                    $_SESSION['success'] = $resp->msg;
                    header('Location:' . SITE_URL . 'admin/users/');
                } else {
                    $_SESSION['error'] = $resp->msg;
                    header('Location:' . SITE_URL . 'admin/users/');
                }
            } else {
                $_SESSION['error'] = 'Invalid request';
                header('Location:' . SITE_URL . 'admin/users/');
            }
        } else {
            header('Location:' . SITE_URL . 'admin/login/');
        }
    }

    //language list
    public function languages() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
            $this->data['title'] = 'Languages';
            $workflow = new \AdminWorkflow\LangWorkflow();
            $resp = $workflow->getLangs();
            if ($resp->code) {
                $this->data['langs'] = $resp->body;
            } else {
                $this->data['errors'] = $resp->msg;
            }
            load('admin/header', $this->data);
            load('admin/langs', $this->data);
            load('admin/footer', $this->data);
        } else {
            header('Location:' . SITE_URL . 'admin/login/');
        }
    }

    // add language
    public function addlang() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
            $this->data['title'] = 'Add Language';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //email
                if (isset($_POST['lang']) && !empty($_POST['lang'])) {
                    $lang = secure($_POST['lang']);
                } else {
                    $this->errors[] = 'Enter language shortcode!';
                }
                if (count($this->errors) > 0) {
                    $this->data['errors'] = $this->errors;
                    load('admin/header', $this->data);
                    load('admin/addlang', $this->data);
                    load('admin/footer', $this->data);
                } else {
                    $lm = new \Models\LangModel();
                    $workflow = new \AdminWorkflow\LangWorkflow();
                    $lm->lang_shortcode = $lang;

                    $resp = $workflow->addLang($lm);
                    if ($resp->code) {
                        $this->data['success'] = 'Language successfully added!';
                    } else {
                        $this->errors[] = $resp->msg;
                        $this->data['errors'] = $this->errors;
                    }

                    load('admin/header', $this->data);
                    load('admin/addlang', $this->data);
                    load('admin/footer', $this->data);
                }
            } else {
                load('admin/header', $this->data);
                load('admin/addlang', $this->data);
                load('admin/footer', $this->data);
            }
        } else {
            header('Location:' . SITE_URL . 'admin/login/');
        }
    }

    //update lang
    public function editlang($id) {
        $this->data['title'] = 'Update Language';
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
            if (isset($id) && !empty($id)) {
                $id = intval(secure($id));
                $lm = new \Models\LangModel();
                $workflow = new \AdminWorkflow\LangWorkflow();
                $lm->lang_id = $id;
                $result = $workflow->getLang($lm);
                if ($result->code) {
                    $this->data['lang'] = $result->body->lang_shortcode;
                } else {
                    $_SESSION['errors'] = $result->msg;
                    header('Location:' . SITE_URL . 'admin/languages/');
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    //lang
                    if (isset($_POST['lang']) && !empty($_POST['lang'])) {
                        $lang = secure($_POST['lang']);
                    } else {
                        $lang = $result->body->lang_shortcode;
                    }


                    if (count($this->errors) > 0) {
                        // echo '<script>alert(1)</script>';

                        $this->data['errors'] = $this->errors;

                        load('admin/header', $this->data);
                        load('admin/updatelang', $this->data);
                        load('admin/footer', $this->data);
                    } else {

                        $lm->lang_shortcode = $lang;
                        $lm->lang_id = $id;


                        $resultUpdate = $workflow->updateLang($lm);
                        if ($resultUpdate->code) {
                            $this->data['success'] = $resultUpdate->msg;
                        } else {
                            $this->data['errors'] = $resultUpdate->msg;
                        }
                        load('admin/header', $this->data);
                        load('admin/updatelang', $this->data);
                        load('admin/footer', $this->data);
                    }
                }

                load('admin/header', $this->data);
                load('admin/updatelang', $this->data);
                load('admin/footer', $this->data);
            } else {
                $_SESSION['error'] = 'Invalid request!';
                header('Location:' . SITE_URL . 'admin/languages/');
            }
        } else {
            header('Location:' . SITE_URL . 'admin/login/');
        }
    }

    //delete lang 
    public function deletelang($id) {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
            if (isset($id) && !empty($id)) {
                $id = intval($id);
                $lm = new \Models\LangModel();
                $lm->lang_id = $id;
                $workflow = new \AdminWorkflow\LangWorkflow();
                $resp = $workflow->deleteLang($lm);
                if ($resp->code) {
                    $_SESSION['success'] = $resp->msg;
                    header('Location:' . SITE_URL . 'admin/languages/');
                } else {
                    $_SESSION['error'] = $resp->msg;
                    header('Location:' . SITE_URL . 'admin/languages/');
                }
            } else {
                $_SESSION['error'] = 'Invalid request';
                header('Location:' . SITE_URL . 'admin/languages/');
            }
        } else {
            header('Location:' . SITE_URL . 'admin/login/');
        }
    }

    //profile
    public function profile() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
            $this->data['title'] = 'My Profile';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //old password
                if (isset($_POST['oldpass']) && !empty($_POST['oldpass'])) {
                    $oldpass = crocus_hash($_POST['oldpass']);
                } else {
                    $this->errors[] = 'Please, enter your old password!';
                }
                //new password
                if (isset($_POST['newpass']) && !empty($_POST['newpass'])) {
                    $newpass = crocus_hash($_POST['newpass']);
                } else {
                    $this->errors[] = 'Please enter new password';
                }
                //new pass confirm
                if (isset($_POST['repass']) && !empty($_POST['repass'])) {
                    $repass = crocus_hash($_POST['repass']);
                    //same pass
                    if ($newpass != $repass) {
                        $this->errors[] = 'The passwords do not match';
                    }
                } else {
                    $this->errors[] = 'Please confirm new password';
                }

                if (count($this->errors) == 0) {
                    $workflow = new \AdminWorkflow\UserWorkflow;
                    $um = new \Models\UserModel;
                    $um->user_id = $_SESSION['user_id'];
                    $um->data['newpass'] = $newpass;
                    $um->data['oldpass'] = $oldpass;
                    $resp = $workflow->changePass($um);
                    if ($resp->code) {
                        $this->data['success'] = $resp->msg;
                    } else {
                        $this->data['errors'] = $resp->msg;
                    }
                } else {
                    $this->data['errors'] = $this->errors;
                }


                load('admin/header', $this->data);
                load('admin/profile', $this->data);
                load('admin/footer', $this->data);
            } else {
                load('admin/header', $this->data);
                load('admin/profile', $this->data);
                load('admin/footer', $this->data);
            }
        } else {
            header("Location: " . SITE_URL . "/admin/login/");
        }
    }

    //upload
    public function upload() {
        if ($_SESSION['logged_in'] && $_SESSION['logged_in'] == 1) {
            echo SITE_URL . UPLOADS_DIR . upload($_FILES['image']);
        }
    }



}
