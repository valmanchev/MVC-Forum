<h1>Comments</h1>
<?php foreach($this->answers as $answer) : ?>
    <div>
        <h2><div><?php echo htmlspecialchars($answer[0]) ?>. <?php echo htmlspecialchars($answer[1]) ?></div></h2>
        <a class="right" href="/questions/deleteAnswer/<?=$answer[0]?> ">Delete</a>
        Author: <b><?php echo htmlspecialchars($answer[2]) ?></b> Email: <b><?php echo htmlspecialchars($answer[3]) ?></b>
    </div>
<?php endforeach; ?>