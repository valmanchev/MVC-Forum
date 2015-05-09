<h1><?= htmlspecialchars($this->title) ?></h1>
</table>
<?php foreach($this->categories as $category) : ?>
    <div class="category">
        <h2><?php echo htmlspecialchars($category['id']) ?>. <a href="/categories/questions/<?=$category['id']?>"><?php echo htmlspecialchars($category['name']) ?></a></h2>
        <a class="right" href="/categories/delete/<?= $category['id']?> ">Delete</a>
    </div>
<?php endforeach; ?>
<h3><a class="right" href="/categories/create">New</a></h3>