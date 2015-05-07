<?php

class CategoriesController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Categories";
        $this->db = new CategoriesModel();
    }

    public function index() {
        $this->authorize();
        $this->categories = $this->db->getAll();
        $this->renderView();
    }

    public function create() {
        $this->authorize();

        if ($this->isPost) {
            $name = $_POST['category_name'];

            if (strlen($name) < 2) {
                $this->addFieldValue('category_name', $name);
                $this->addValidationError('category_name', 'The category name length should be greater than 2');
                return $this->renderView(__FUNCTION__);
            }

            if ($this->db->createCategory($name)) {
                $this->addInfoMessage("Category created.");
                $this->redirect('categories');
            } else {
                $this->addErrorMessage("Error creating category.");
            }
        }

        $this->renderView(__FUNCTION__);
    }

    public function delete($id) {
        $this->authorize();

        if ($this->db->deleteCategory($id)) {
            $this->addInfoMessage("Category deleted.");
        } else {
            $this->addErrorMessage("Cannot delete category.");
        }
        $this->redirect('categories');
    }
}