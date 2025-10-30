<h2>Edit Data Departemen</h2>
<form action="{{ route('departemens.update', $departemen->id) }}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td>Nama Departemen</td>
            <td><input type="text" name="nama_departemen" value="{{ old('nama_departemen', $departemen->nama_departemen) }}" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Update</button>
            </td>
        </tr>
    </table>
</form>