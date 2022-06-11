@extends('blog/template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Blog</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('blog.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul :</strong>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $blog->title) }}" placeholder="Masukkan Judul Blog">

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
                        <strong>Deskripsi :</strong>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $blog->description) }}" placeholder="Masukkan Deskripsi">

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
                                <strong>Dibuat Oleh :</strong>
                                <input type="text" class="form-control @error('created_user_id') is-invalid @enderror" name="created_user_id" value="{{ old('created_user_id', $blog->created_user_id) }}" placeholder="Masukkan Nama Pengguna">

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
                                        <strong>Penulis :</strong>
                                        <input type="text" class="form-control @error('created_author_id') is-invalid @enderror" name="created_author_id" value="{{ old('created_author_id', $blog->created_author_id) }}" placeholder="Masukkan Nama Penulis">

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
                                                <label class="font-weight-bold">GAMBAR</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>

                                            @error('image')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                                </div>
                                            </div>

</form>
@endsection