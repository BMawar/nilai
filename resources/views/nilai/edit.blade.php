<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('nilai.index') }}" class="btn btn-md btn-secondary mb-2"><< KEMBALI</a>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('nilai.update', $nilai->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                           
                            <div class="form-group">
                                <label class="font-weight-bold">NAMA SISWA</label>
                                <select class="form-control @error('id_siswa') is-invalid @enderror" name="id_siswa" size="1">
                                    <option value="" selected disabled> Pilih Nama </option>
                                    {{-- Looping untuk menampilkan nama-nama guru --}}
                                    @foreach($siswas as $siswaItem)
                                    <option value="{{ $siswaItem->id }}" {{ (old('id_siswa', $siswaItem->id) == $siswaItem->id) ? 'selected' : '' }}>{{ $siswaItem->nama }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk id_guru -->
                                @error('id_siswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA MAPEL</label>
                                <select class="form-control @error('id_mapel') is-invalid @enderror" name="id_mapel" size="1">
                                    <option value="" selected disabled> Pilih Mapel </option>
                                    {{-- Looping untuk menampilkan nama-nama guru --}}
                                    @foreach($mapel as $mapelItem)
                                    <option value="{{ $mapelItem->id }}" {{ (old('id_mapel', $mapelItem->id) == $mapelItem->id) ? 'selected' : '' }}>{{ $mapelItem->nama_mapel }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk id_guru -->
                                @error('id_mapel')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NILAI</label>
                                <input type="text" class="form-control @error('nilai') is-invalid @enderror" name="nilai" value="{{ old('nilai', $nilai->nilai) }}" placeholder="Masukkan Nilai">
                            
                                <!-- error message untuk title -->
                                @error('nilai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                        
                            <button type="submit" class="btn btn-md btn-primary mt-2">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning mt-2">RESET</button>

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
    
</script>
</body>
</html>