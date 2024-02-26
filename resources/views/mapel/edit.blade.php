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
                <a href="{{ route('mapel.index') }}" class="btn btn-md btn-secondary mb-2"><< KEMBALI</a>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('mapel.update', $mapel->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                           
                            <div class="form-group">
                                <label class="font-weight-bold">GURU</label>
                                <select class="form-control @error('id_guru') is-invalid @enderror" name="id_guru" size="1">
                                    <option value="" selected disabled> Pilih Guru </option>
                                    {{-- Looping untuk menampilkan nama-nama guru --}}
                                    @foreach($gurus as $guruItem)
                                    <option value="{{ $guruItem->id }}" {{ (old('id_guru', $mapel->id_guru) == $guruItem->id) ? 'selected' : '' }}>{{ $guruItem->nama_guru }}</option>

                                    @endforeach
                                </select>
                                <!-- error message untuk id_guru -->
                                @error('id_guru')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA MAPEL</label>
                                <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" name="nama_mapel" value="{{ old('nama_mapel', $mapel->nama_mapel) }}" placeholder="Masukkan Judul Post">
                            
                                <!-- error message untuk title -->
                                @error('nama_mapel')
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