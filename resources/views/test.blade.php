<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test Perplexity API</title>
</head>
<body>
    <div>
        <p id="ai">Loading...</p>
    </div>
    <script src="{{ asset('js/test.js') }}"></script>
</body>
</html>

