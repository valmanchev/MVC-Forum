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

    public function getFilteredBooks($from, $size) {
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
}