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
    <form method="POST" action="{{ route('update') }}" class="mx-auto pt-5" style="max-width:700px;" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{$userinfosByID->email}}" class="form-control">
            <input type="hidden" name="id" value="{{$userinfosByID->id}}" class="form-control">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="passoword" value="{{$userinfosByID->password}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Upload file</label>
            <input type="file" name="file_name" class="form-control-file">
            <img src="{{asset($userinfosByID->file_name)}}" alt="" height="150" width="150">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>