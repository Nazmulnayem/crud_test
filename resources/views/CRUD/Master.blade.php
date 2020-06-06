<html>
<head>
    <title>BiTechX Test</title>
    <link rel="shortcut icon" type="image/png" href="https://bitechx.com/images/favicon/bitechx.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Data Table CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.foundation.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.foundation.min.js"></script>

</head>
<body>
<div class="container">
    <h1 class="text-center">BiTechX Test</h1>
    <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
    <form method="POST" action="{{ route('Save') }}" class="mx-auto pt-5" style="max-width:700px;" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Upload file</label>
            <input type="file" name="file_name" accept="image/" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <table class="table table-striped table-bordered mx-auto pt-5" style="width:100%;max-width:700px;">
        <thead>
        <tr>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($users as $user)
        <tbody>

        <tr>
            <td>{{$user->email}}</td>
            <td><button class="btn btn-primary"><a style="color: white; text-decoration: none;" href="{{url('/user/edit/'.$user->id)}}">Edit</a></button></td>
            <td><button class="btn btn-danger"><a style="color: white; text-decoration: none;" href="{{url('/user/delete/'.$user->id)}}">Delete</a></button></td>

        </tr>

        </tbody>
            @endforeach
        </thead>
    </table>
</div>
</body>
</html>