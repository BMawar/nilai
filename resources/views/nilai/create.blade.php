<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('nilai.index') }}" class="btn btn-md btn-secondary mb-2"><< KEMBALI</a>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">SISWA</label>
                                <select class="form-control @error('id_siswa') is-invalid @enderror" name="id_siswa" size="1">
                                    <option value="" selected disabled> Pilih Siswa </option>
                                    {{-- Looping untuk menampilkan nama-nama siswa --}}
                                    @foreach($siswas as $siswas)
                                        <option value="{{ $siswas->id }}">{{ $siswas->nama }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk nama -->
                                @error('id_siswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">MAPEL</label>
                                <select class="form-control @error('id_mapel') is-invalid @enderror" name="id_mapel" size="1">
                                    <option value="" selected disabled> Pilih Mapel </option>
                                    {{-- Looping untuk menampilkan nama-nama siswa --}}
                                    @foreach($mapel as $mapel)
                                        <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk nama -->
                                @error('id_mapel')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NILAI</label>
                                <input type="text" class="form-control @error('nilai') is-invalid @enderror" name="nilai" value="{{ old('nilai') }}" placeholder="Masukkan Nilai">
                            
                                <!-- error message untuk title -->
                                @error('nilai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>