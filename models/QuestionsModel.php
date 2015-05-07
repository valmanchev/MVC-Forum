<?php

class QuestionsModel extends  BaseModel {
    public  function getAll() {
        //$statement = self::$db->query("SELECT id, name, counter, category_id, tag_id FROM questions");
        $statement = self::$db->query("SELECT q.id, q.name, q.counter, c.name, t.name
                                        FROM questions q
                                        JOIN categories c
                                        ON q.category_id = c.id
                                        JOIN tags t
                                        ON q.tag_id = t.id");
        $result = $statement->fetch_all();
        //var_dump($result);
        return $result;

    }

    public function getFilteredQuestions($from, $size) {
        //$statement = self::$db->prepare("SELECT id, name, counter, category_id, tag_id FROM questions LIMIT ?, ?");
        $statement = self::$db->prepare("SELECT q.id, q.name, q.counter, c.name, t.name
                                        FROM questions q
                                        JOIN categories c
                                        ON q.category_id = c.id
                                        JOIN tags t
                                        ON q.tag_id = t.id LIMIT ?, ?");
        $statement->bind_param("ii", $from, $size);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        //var_dump($result);
        return $result;
    }

    public function getAnswers($id) {
        $statement = self::$db->query(
            "SELECT * FROM answers ORDER BY id WHERE question_id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();

        return $result;
    }

    public function deleteQuestion($id) {
        $statement = self::$db->prepare(
            "DELETE FROM questions WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function createQuestion($name) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO questions VALUES(NULL, ?, NULL, NULL, NULL)");
        $statement->bind_param("s", $name);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

}