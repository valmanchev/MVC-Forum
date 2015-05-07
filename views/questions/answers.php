<h1>Answers</h1>

<?php foreach($this->answers as $question) : ?>

    <div>
        <h2><div><?php echo $question[0] ?>. <?php echo $question[1] ?></div></h2>
        <a class="right" href="/questions/delete/<?=$question[0]?> ">Delete</a>
        Category: <b><?php echo $question[3] ?></b> Tag: <b><?php echo $question[4] ?></b>
    </div>
<?php endforeach; ?>
