<!DOCTYPE html>
<html>
<head>
    <title>Daily Task Summary</title>
</head>
<body>
    <h1>Daily Task Summary</h1>

    <ul>
        @foreach($tasks as $task)
            <li>
                <strong>Title:</strong> {{ $task->title }}<br>
                <strong>Description:</strong> {{ $task->description }}<br>
                <strong>Status:</strong> {{ $task->status }}
            </li>
        @endforeach
    </ul>
</body>
</html>
