<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHU KOSUDGAMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4A00E0, #8E2DE2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            border: none;
            text-align: center;
        }
        .card-header {
            background-color: white;
            padding: 20px;
        }
        .card-header img {
            max-width: 150px; /* Sesuaikan ukuran logo */
            height: auto;
        }
        .card-body {
            background: white;
            padding: 20px;
        }
        .btn-primary {
            background-color: #4A00E0;
            border: none;
        }
        .btn-primary:hover {
            background-color: #8E2DE2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <img src="logo_kosudgama.png" alt="Logo KOSUDGAMA"> <!-- Pastikan path logo benar -->
                    </div>
                    <div class="card-body">
                        <h4 class="mb-3">SHU KOSUDGAMA</h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Anggota</label>
                                <input type="text" name="nama_anggota" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Anggota</label>
                                <input type="text" name="no_anggota" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
