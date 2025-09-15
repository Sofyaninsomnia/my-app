<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data username</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css">
</head>

<body>

    <div class="container">
        <a href="{{ route('tambah') }}" class="btn btn-primary mt-4">Tambah</a>
        <table class="table table-bordered mt-1">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @forelse ($data as $data)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apa anda yakin?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </script>
    <script>
    $(document).ready(function() {
        // Cek apakah ada pesan 'success' dari session
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        @if($errors->any())
            Swal.fire({
                title: 'Kesalahan!',
                html: '@foreach ($errors->all() as $error) {{ $error }}<br> @endforeach',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif
    });
  </script>
</body>

</html>
