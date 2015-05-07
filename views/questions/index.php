<h1>Questions</h1>
    <?php foreach($this->questions as $question) : ?>
        <div>
            <h2><div><?php echo $question[0] ?>. <a href="/questions/answers/<?=$question[0]?>"><?php echo $question[1] ?></a></div></h2>
            <div class="right"><a href="/questions/delete/<?=$question[0]?> ">Delete</a> |
            <a href="/questions/comment/<?=$question[0]?> ">Comment</a></div>
            Category: <b><?php echo $question[3] ?></b> Tag: <b><?php echo $question[4] ?></b>
        </div>
    <?php endforeach; ?>
<a href="/questions/index/<?= $this->page - 1 ?>/<?= $this->pageSize ?>">Previous</a>
<a href="/questions/index/<?= $this->page + 1 ?>/<?= $this->pageSize ?>">Next</a>
<a href="/questions/create" class="right">New</a>