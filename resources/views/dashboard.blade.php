<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        .logout-btn {
            background-color: #dc3545;
            border: none;
            transition: 0.3s;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        table {
            font-size: 14px;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
            padding: 8px;
        }
        th {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="dashboard-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold text-primary">Dashboard SHU</h3>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn logout-btn text-white">Logout</button>
                </form>
            </div>
            <table id="dataTable" class="table table-striped table-bordered w-100">
                <thead>
                    <tr>
                        <th class="text-center">Nama Anggota</th>
                        <th class="text-center">No Anggota</th>
                        <th class="text-center">Nominal SHU</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->nama_anggota }}</td>
                        <td>{{ $row->no_anggota }}</td>
                        <td>Rp {{ number_format($row->nominal_shu, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "paging": true,
                "lengthMenu": [5, 10, 50, 100],
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "→",
                        "previous": "←"
                    }
                }
            });
        });
    </script>
</body>
</html>
