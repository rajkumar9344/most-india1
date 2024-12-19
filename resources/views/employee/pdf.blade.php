<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        h1 {
            text-align: center;
        }
        thead {
            background-color: #041F5A;
            color: white;
        }
    </style>
</head>
<body>
    <img src="{{ $base64Logo }}" alt="Logo" style="width: 150px; height: auto;">
    <h1>Employee List</h1>
    <table>
        <thead>
            <tr>
                @foreach ($columns as $column)
                    <th>{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    @foreach ($columns as $column)
                        <td>{{ $employee->$column }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
