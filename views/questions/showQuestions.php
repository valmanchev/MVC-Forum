<div>
    <ul>
        <?php foreach ( $this->questions as $question) : ?>
            <li>
                <?php echo $question[0]; ?>
                <?php echo $question[1]; ?>
                <?php echo $question[2]; ?>
                <?php echo $question[3]; ?>
                <?php echo $question[4]; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>