{{-- {{$data}} --}}
@extends('layout.navbar')
 @section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-light ps-5 p-2 bg-dark">My courses</h3>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                <a href="/courses/create" class="btn btn-primary m-3"> Add New Course</a>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($data as $item)
            <div class="col">
              <div class="card h-100">
                <img src="{{$item["img"]}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$item["name"]}}</h5>
                  <p class="card-text">{{$item["description"]}}</p>
                  <h6 class="card-title">{{$item["duration"]}} houres</h6>
                <p class="card-text">Instructor: {{$item->user->name}}</p>
                <hr>
                <div class="row ps-2">
                <a type="button" class="btn btn-warning col-3"  href = "/courses/{{$item['id']}}/edit" > ✏️ Edit</a>
                <form action="/courses/{{$item['id']}}" method="post" class="col-3">
                    @method("Delete")
                    @csrf
                    <input type="submit" class="btn btn-danger" value="🗑 Delete">
                </form>
            </div>
                </div>
              </div>
            </div>
            @empty 
            <h6 class="text-danger"> No corses </h6>
            @endforelse
          </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>  
@endsection