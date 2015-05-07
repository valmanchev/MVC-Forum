<h1>Answers</h1>
<?php foreach($this->answers as $answer) : ?>
    <div>
        <h2><div><?php echo $answer[0] ?>. <?php echo $answer[1] ?></div></h2>
        <a class="right" href="/questions/deleteAnswer/<?=$answer[0]?> ">Delete</a>
        Author: <b><?php echo $answer[2] ?></b> Email: <b><?php echo $answer[3] ?></b>
    </div>
<?php endforeach; ?>