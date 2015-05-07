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
        $this->questions = $this->db->getFilteredQuestions($from, $pageSize);

        $this->renderView();

    }

    public  function  showQuestions() {
        $this->questions =  $this->db->getAll();
        $this->renderView(__FUNCTION__, false);

    }

    public function showAnswers($id) {
        $this->authorize();


        if ($this->db->getAnswers($id)) {
            $this->addInfoMessage("Category deleted.");
        } else {
            $this->addErrorMessage("Cannot delete category.");
        }
        //$this->redirect('categories');
    }

    public function delete($id) {
        $this->authorize();


        if ($this->db->deleteQuestion($id)) {
            $this->addInfoMessage("Question deleted.");
        } else {
            $this->addErrorMessage("Cannot delete question.");
        }
        $this->redirect('questions');
    }

    public function comment($id) {
        $this->authorize();
        if ($this->isPost) {
            $name = $_POST['comment_name'];

            if (strlen($name) < 2) {
                $this->addFieldValue('comment_name', $name);
                $this->addValidationError('comment_name', 'The comment name length should be greater than 2');
                $this->redirect('questions');

            }

            var_dump($id);

            if ($this->db->createAnswer($name, $id)) {
                $this->addInfoMessage("Comment created.");
                $this->redirect('questions');
            } else {
                $this->addErrorMessage("Error creating comment.");
            }
        }

        $this->redirect('questions');


    }

    public function create() {
        $this->authorize();


        if ($this->isPost) {
            $name = $_POST['question_name'];

            if (strlen($name) < 2) {
                $this->addFieldValue('question_name', $name);
                $this->addValidationError('question_name', 'The question name length should be greater than 2');
                return $this->renderView(__FUNCTION__);

            }

            if ($this->db->createQuestion($name)) {
                $this->addInfoMessage("Question created.");
                $this->redirect('questions');
            } else {
                $this->addErrorMessage("Error creating question.");
            }
        }

        $this->renderView(__FUNCTION__);
    }

}

