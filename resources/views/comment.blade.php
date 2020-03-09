@extends('layouts.app')

@section('content')


    <br>
    <div class="card my-5 ml-5">
        <div class="card-header bg-info">Contactez-moi</div>
        <div class="container card-body">
            <form action="" method="POST">
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

@endsection

