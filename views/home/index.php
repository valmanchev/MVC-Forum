<h1>Welcome to Home!</h1>
<div class="center">
<a href="/account/login">Login</a> |
<a href="/account/register">Register</a>
<button id="show-questions">Show questions</button></div>
<div id="questions"></div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $('#show-questions').on('click', function(ev) {
        $.ajax({
            url: '/questions/showQuestions',
            method: 'GET'
        }).success(function(data) {
            $('#questions').html(data);
        })
    })
</script>