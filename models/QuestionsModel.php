<?php

class QuestionsModel extends  BaseModel {
    public  function getAll() {
        $statement = self::$db->query("SELECT q.id, q.name, q.counter, c.name, t.name
                                        FROM questions q
                                        JOIN categories c
                                        ON q.category_id = c.id
                                        JOIN tags t
                                        ON q.tag_id = t.id");
        $result = $statement->fetch_all();

        return $result;
    }

    public function getFilteredQuestions($from, $size) {
        $statement = self::$db->prepare("SELECT q.id, q.name, q.counter, c.name, t.name
                                            FROM questions q
                                            JOIN categories c
                                            ON q.category_id = c.id
                                            JOIN tags t
                                            ON q.tag_id = t.id
                                            ORDER BY id DESC LIMIT ?, ?");
        $statement->bind_param("ii", $from, $size);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();

        return $result;
    }

    public function getAnswers($id) {
        $statement = self::$db->prepare("SELECT * FROM answers WHERE question_id = ? ORDER BY id DESC");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        $this->answers = $result;

        return $result;
    }

    public function deleteQuestion($id) {
        $statement = self::$db->prepare("DELETE FROM questions WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        return $statement->affected_rows > 0;
    }

    public function deleteAnswer($id) {
        $statement = self::$db->prepare("DELETE FROM answers WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        return $statement->affected_rows > 0;
    }

    public function createQuestion($name) {
        if ($name == '') {
            return false;
        }

        $statement = self::$db->prepare("INSERT INTO questions VALUES(NULL, ?, NULL, NULL, NULL)");
        $statement->bind_param("s", $name);
        $statement->execute();

        return $statement->affected_rows > 0;
    }

    public function createComment($name, $id) {
        //var_dump($id);

        if ($name == '') {
            return false;
        }

        $statement = self::$db->prepare("INSERT INTO answers VALUES(NULL, ?, NULL, NULL, ?)");
        $statement->bind_param("si", $name, $id);
        $statement->execute();

        return $statement->affected_rows > 0;
    }
}