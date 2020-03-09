@extends('layouts.app')


@section('content')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <div class="ml-5 w-75 container-fluid">
       Article : {{$post->post_content}} <br/>
       Auteur : {{$post->author->name}}
       <br/>

        @foreach($comments as $comment)
           {{$comment->comment_content}}
        @endforeach



       <br/>
       <div class="card my-5 ml-5 w-50">
           <div class="card-header bg-info">Commentez l'actualité</div>
           <div class="container card-body">
               <form action="{{$post->id}}/comments" method="POST">
                   @csrf
                   <div class="form-group">
                       <input type="text" class="form-control @error('comment_name') is-invalid @enderror " id="comment_name"
                              value="{{ old('comment_name') }}" placeholder="Votre Nom" name="comment_name">
                       @error('comment_name')
                       <div class="invalid-feedback">
                           {{$errors->first('comment_name')}}
                       </div>
                       @enderror
                   </div>

                   <div class="form-group">
                       <input type="email" class="form-control  @error('comment_email') is-invalid @enderror" id="comment_email"
                              value="{{ old('comment_email') }}" placeholder="Votre Email" name="comment_email">
                       @error('comment_email')
                       <div class="invalid-feedback">
                           {{$errors->first('comment_email')}}
                       </div>
                       @enderror
                   </div>


                   <div class="form-group">
                <textarea type="text" rows="8" class="form-control @error('comment_message') is-invalid @enderror" id="comment_message"
                          value="{{ old('comment_message') }}" placeholder="Votre Commentaire" name="comment_message"></textarea>
                       @error('comment_message')
                       <div class="invalid-feedback">
                           {{$errors->first('comment_message')}}
                       </div>
                       @enderror
                   </div>
                   <button class="btn btn-primary">Envoyer</button>
               </form>
           </div>
       </div>
       <br/>


   </div>


@endsection
