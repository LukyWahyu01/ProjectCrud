@extends('index')

@section('MainContent')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Data User</title>
@section('MainContent')


<div class="card">
    <div class="card-header">
        <h1>Tambah Data</h1>
    </div>

    <div class="card-body">
        <form action="/kirimuser" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="kontak" class="form-label">kontak</label>
                <input type="text" name="kontak" id="kontak" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto">
            </div>
            <div class="card-footer">
                <a href="/profile" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
@endsection