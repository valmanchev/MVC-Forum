<?php

class CategoriesModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM categories ORDER BY id");

        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function createCategory($name) {
        if ($name == '') {
            return false;
        }

        $statement = self::$db->prepare("INSERT INTO categories VALUES(NULL, ?)");
        $statement->bind_param("s", $name);
        $statement->execute();

        return $statement->affected_rows > 0;
    }

    public function deleteCategory($id) {
        $statement = self::$db->prepare("DELETE FROM categories WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        return $statement->affected_rows > 0;
    }

    public function getQuestions($id) {
        $statement = self::$db->prepare("SELECT q.id, q.name, q.counter, c.name, t.name
                                            FROM questions q
                                            JOIN categories c
                                            ON q.category_id = c.id
                                            JOIN tags t
                                            ON q.tag_id = t.id WHERE q.category_id = ? ORDER BY id DESC");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        $this->answers = $result;

        return $result;
    }
}