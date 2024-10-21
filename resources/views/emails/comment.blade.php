<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
</head>
<body>
    Hi,
    <br>
    New comment on your Post: {{ $comment->post_id}}
    <br>
    By User: {{ $user['name'] }}
    <br>
    Comment: {{ $comment->content }}
</body>
</html>