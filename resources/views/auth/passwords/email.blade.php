<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワード忘れ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
             
                <div class="card-header bg-primary text-white text-center">
                    <h3>パスワード忘れ</h3>
                </div>

             
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                       


                        <div class="mb-3">
                            <label for="email" class="form-label">メールアドレス:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>




                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">送信</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
