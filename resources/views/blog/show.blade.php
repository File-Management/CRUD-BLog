@extends('blog/template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2> Show Blog</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('blog.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="col">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Judul :</strong>
            <input type="text" name="title" class="form-control" value="{{ $blog->title }}" readonly>
        </div>
    </div>

    <div class="col">
        <div class="col-xs-100 col-sm-100 col-md-100">
            <div class="form-group">
                <strong>Description :</strong>
                <input type="text" name="description" class="form-control" value="{{ $blog->description }}" readonly>
            </div>
        </div>

        <div class="coloumn">
            <div class="col-xs-200 col-sm-200 col-md-200">
                <div class="form-group">
                    <strong>Dibuat Oleh:</strong>
                    <input type="text" name="createdUser->name" class="form-control" value="{{ $blog->createdUser->name }}" readonly>
                </div>
            </div>

            <div class="coloumn">
                <div class="col-xs-200 col-sm-200 col-md-200">
                    <div class="form-group">
                        <strong>Penulis :</strong>
                        <input type="text" name="createdAuthor->name" class="form-control" value="{{ $blog->createdAuthor->name }}" readonly>
                    </div>
                </div>

                <div class="coloumn">
                    <div class="col-xs-200 col-sm-200 col-md-200">
                        <div class="form-group">
                            <strong>Gambar :</strong>
                            <td class="text-center">
                                <input type="text" name="image" class="form-control" value="{{ $blog->image }}" readonly>
                            </td>
                        </div>
                    </div>
                </div>
                @endsection