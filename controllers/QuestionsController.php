<?php

class QuestionsController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Questions";
        $this->db = new QuestionsModel();
    }

    public function index($page = 0, $pageSize = 5) {
        $this->authorize();
        $from = $page * $pageSize;

        $pages = count($this->db->getAll());
        $pages = $pages / $pageSize;
        $pages = ceil($pages);

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

    public function deleteAnswer($id) {
        $this->authorize();

        if ($this->db->deleteAnswer($id)) {
            $this->addInfoMessage("Comment deleted.");
        } else {
            $this->addErrorMessage("Cannot delete comment.");
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

    public function comment($id) {
        $this->authorize();

        if ($this->isPost) {
            $name = $_POST['comment_name'];

            if (strlen($name) < 2) {
                $this->addFieldValue('comment_name', $name);
                $this->addValidationError('comment_name', 'The comment length should be greater than 2');

                return $this->renderView(__FUNCTION__);
            }

            if ($this->db->createComment($name, $id)) {
                $this->addInfoMessage("Comment created.");
                $this->redirect('questions');
            } else {
                $this->addErrorMessage("Error creating comment.");
            }
        }

        $this->comment = $id;
        $this->renderView(__FUNCTION__);
    }

    public function answers($id) {
        $this->authorize();
        $this->answers = $this->db->getAnswers($id);
        $this->renderView(__FUNCTION__);
    }
}