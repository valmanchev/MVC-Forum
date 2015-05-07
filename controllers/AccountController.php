<?php

class AccountController extends BaseController {
    private $db;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function register() {
        //$this->db->register();

        //var_dump($_POST);

        if ($this->isPost) {
            //get username
            $username = $_POST['username'];
            if ($username == null || strlen($username) < 8) {
                $this->addErrorMessage("Username is invalid!");
                $this->redirect("account", "register");
            }
            //get password
            $password = $_POST['password'];

            //register user
            $isRegistered = $this->db->register($username, $password);

            //redirect user
            if ($isRegistered) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Successful registration!");

                $this->redirect("questions", "index");
            }
            else {
                $this->addErrorMessage("Registered failed!");
            }
        }

        $this->renderView(__FUNCTION__);

    }

    public function login() {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLoggedIn = $this->db->login($username, $password);
            //var_dump($isLoggedIn);
            if ($isLoggedIn) {
                $_SESSION['username'] = $username;

                $this->addInfoMessage("Successful login!");
                return $this->redirect("books", "index");
            }
            else {
                $this->addErrorMessage("Login error!");

            }
        }

        //var_dump($isLoggedIn);

        $this->renderView(__FUNCTION__);
    }

    public function logout() {
        $this->authorize();


        unset($_SESSION['username']);
        $this->addInfoMessage("Successful logout!");
        $this->redirectToUrl("/");

    }
}