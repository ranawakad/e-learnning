
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
        @extends('layout.navbar')
        @section('content')
        <h3 class="text-light ps-5 p-2 bg-dark">Course Details</h3>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Course name : {{$data["name"]}}
                    </div>
                    <div class="card-body">
                      <p class="card-text">Description : {{$data["description"]}}</p>
                      <p class="card-text">duration : {{$data["duration"]}} hours</p>
                      <p class="card-text">Instructor: {{$data->user->name}}</p>
                      <a href="/courses" class="btn btn-primary">Go Back</a>
                    </div>
                  </div>





            {{-- <div class="card container" style="width: 70rem">
                <div class="card-header"><h5 class="card-title">{{$data["name"]}}</h5></div>
                <div class="card-body">
                  
                  <p class="card-text">{{$data["description"]}}</p>
                  <a href="/courses" class="btn btn-primary">Back</a> --}}
                   
                  {{-- <h1 class="m-2">Add Comment</h1>
                <form action="{{route('comments.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="body" class="form-label">Comment</label>
                    <textarea class="form-control" name="body"></textarea>
                </div>    
                <input type="text" name="article_id" hidden value="{{$data->id}}">
                
                <input type="submit" class="btn btn-dark" value="add comment"> --}}
                {{-- <button type="submit" class="btn btn-primary">add comment</button> --}}
                {{-- </form>
                @include('articles.displayComment',['comments'=> $data->comments,"article_id"=>$data->id]) --}}

                </div>
                
            </div>
              </div>

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
        @endsection
    </body>
    </html>