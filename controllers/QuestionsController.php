<?php

class QuestionsController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Questions";
        $this->db = new QuestionsModel();

    }

    public function index($page = 0, $pageSize = 10) {
        //var_dump($page);
        //var_dump($pageSize);


        $this->authorize();

        $from = $page * $pageSize;
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->questions = $this->db->getFilteredBooks($from, $pageSize);

        $this->renderView();

    }

    public  function  showQuestions() {
        $this->questions =  $this->db->getAll();
        $this->renderView(__FUNCTION__, false);

    }
}
