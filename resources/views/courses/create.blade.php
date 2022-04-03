@extends('layout.navbar')
 @section('content')
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="">
    <div class="container">
    <h3>Create Course </h3>
    <form class="" action="/courses" method="post">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name">
          <label class="text-danger">{{$errors->first('name')}} </label>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea value="" class="form-control" name="description" id="description" style="height: 100px">{{old('description')}}</textarea>
            <label class="text-danger">{{$errors->first('description')}} </label>
          </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="number" value="{{old('duration')}}" class="form-control" id="duration" name="duration">
            <label class="text-danger">{{$errors->first('duration')}} </label>
          </div>
          <div class="mb-3">
            <label for="img" class="form-label">Image URL</label>
            <input type="text" value="{{old('img')}}" class="form-control" id="img" name="img">
            <label class="text-danger">{{$errors->first('img')}} </label>
          </div>
        <button type="submit" class="btn btn-primary">Create course</button>
      </form> 
    </div>  
</body>
 @endsection