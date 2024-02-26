<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mapel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('guru.index') }}" class="btn btn-md btn-secondary">DATA GURU</a>
                    <a href="{{ route('siswa.index') }}" Class="btn btn-md btn-info">DATA SISWA</a>
                    <a href="{{ route('mapel.index') }}" Class="btn btn-md btn-info">DATA MAPEL</a>
                    <a href="{{ route('nilai.index') }}" Class="btn btn-md btn-info">DATA NILAI</a>
                </div>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('mapel.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA MAPEL</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NAMA GURU</th>
                                <th scope="col">NAMA MAPEL</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($mapel as $mapel)
                                <tr>
                    
                                    <td>{{ $mapel->gurus->nama_guru }}</td>
                                    <td>{!! $mapel->nama_mapel !!}</td>                                   
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mapel.destroy', $mapel->id) }}" method="POST">
                                            <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>