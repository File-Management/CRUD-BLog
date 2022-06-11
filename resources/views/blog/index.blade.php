<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>CRUD BLOG</title>
</head>

<body>
    <div class="container mt-5">
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('blog.create') }}"> Input Blog</a>
        </div>
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Dibuat Oleh</th>
                    <th>Penulis</th>
                    <th>Gambar</th>
                    <th width="200px" class="text-center">Action</th>
                </tr>
            <tbody>
                @foreach ($data_blogs as $i => $blog)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
                    <td>{{ $blog->createdUser->name }}</td>
                    <td>{{ $blog->createdAuthor->name }}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage/blogs/'.$blog->image) }}" class="rounded" style="width: 150px">
                    </td>


                    <td class="text-center">
                        <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('blog.show',$blog->id) }}">Show</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('blog.edit',$blog->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</html>