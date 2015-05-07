<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/content/styles.css" />
    <title>
        <?php if (isset($this->title)) echo htmlspecialchars($this->title) ?>
    </title>
</head>

<body>
    <header>
        <a href="/"><img src="/content/images/vm.png"></a>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/categories">Categories</a></li>
            <?php if ($this->isLoggedIn) : ?>
            <li><a href="/questions">Questions</a></li>

            <?php endif; ?>

        </ul>
        <?php if ($this->isLoggedIn) : ?>
        <div id="logged-in-info">
            <span>Hello, <?php echo $_SESSION['username']; ?></span>

            <form action="/account/logout"><input type="submit" value="Logout"/></form>
        </div>
        <?php endif; ?>
    </header>

    <?php var_dump($this->isLoggedIn) ?>

    <?php include('messages.php'); ?>
