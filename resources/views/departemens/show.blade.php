<!DOCTYPE html>
<html>
<head>
    <title>Detail Departemen</title>
</head>
<body>
    <h1>Detail Departemen</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama Departemen</th>
            <td>{{ $departemen->nama }}</td>
        </tr>
        <tr>
            <th>Dibuat</th>
            <td>{{ $departemen->created_at }}</td>
        </tr>
        <tr>
            <th>Diupdate</th>
            <td>{{ $departemen->updated_at }}</td>
        </tr>
    </table>
</body>
</html>