<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Posts Table</h2>

<table>
  <tr>
    <th>No</th>
    <th>Title</th>
    <th>Description</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach ($posts as $post)
  <tr>
    <td>{{ $loop->iteration }}</td>    
    <td>{{ $post->title }}</td>
    <td>{{ $post->description }}</td>
    @can('post',$post)
    <td> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a></td>
    <td> <button onclick="PostDelete('{{ $post->id }}')" type="button" class="btn btn-danger">Delete</button></td>
    @elsecan('is_admin')
    <td> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a></td>
    <td> <button onclick="PostDelete('{{ $post->id }}')" type="button" class="btn btn-danger">Delete</button></td>
    @endcan
  </tr>
  @endforeach
</table>
<br>
<a href="{{ route('logout') }}" style="margin-left: 94%" type="button" class="btn btn-dark">Logout</button>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        <script>
            function PostDelete(id) {
                console.log(id)
                swal({
                    title: "Warning",
                    text: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    buttons: ["No", "Yes"],
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('posts.delete') }}",
                                data: { "_token": "{{ csrf_token() }}", id:id },
                                type: "POST",
                                success: function (data) {
                                    if(data==="ok"){
                                        swal("Success!", "Post deleted!!", "success");
                                        window.setTimeout(function(){location.reload()},2000)
                                    }else{
                                        swal("Error!", "Post didn't deleted!", "error");
                                    }
                                },
                                error: function (x, sts) {
                                    console.log("Error...");
                                    console.log('no');
                                },
                            });
                        } else {
                            swal("Cancelled!");
                        }
                    });
            }
        </script>


</body>
</html>