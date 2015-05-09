<?php foreach($this->questions as $question) : ?>
    <div>
        <h2><div><?php echo htmlspecialchars($question[0]) ?>. <a href="/questions/answers/<?=$question[0]?>"><?php echo htmlspecialchars($question[1]) ?></a></div></h2>
        <div class="right"><a href="/questions/delete/<?=$question[0]?> ">Delete</a> |
            <a href="/questions/comment/<?=$question[0]?> ">Comment</a></div>
        Category: <b><?php echo htmlspecialchars($question[3]) ?></b> Tag: <b><?php echo htmlspecialchars($question[4]) ?></b>
    </div>
<?php endforeach; ?>