<h2>Edit Data Departemen</h2>
<form action="{{ route('departemens.update', $departemen->id) }}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td>Nama Departemen</td>
            <td><input type="text" name="nama" value="{{ old('nama', $departemen->nama) }}" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Update</button>
            </td>
        </tr>
    </table>
</form>