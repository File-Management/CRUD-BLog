@extends('blog/template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create New Blog</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('blog.index') }}"> Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Input gagal.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label class="font-weight-bold">JUDUL :</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Blog">

                <!-- error message untuk title -->
                @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Deskripsi :</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Masukkan Deskripsi">

                        <!-- error message untuk title -->
                        @error('description')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Dibuat Oleh :</label>
                                <input type="text" class="form-control @error('created_user_id') is-invalid @enderror" name="created_user_id" value="{{ old('created_user_id') }}" placeholder="Masukkan ID Pengguna">

                                <!-- error message untuk title -->
                                @error('created_user_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Penulis :</label>
                                                <input type="text" class="form-control @error('created_author_id') is-invalid @enderror" name="created_author_id" value="{{ old('created_author_id') }}" placeholder="Masukkan ID Penulis">

                                                <!-- error message untuk title -->
                                                @error('created_author_id')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Gambar :</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                        @error('image')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                            </div>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</form>
@endsection