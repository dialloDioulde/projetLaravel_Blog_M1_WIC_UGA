@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <br>
        <div class="card my-5 ml-5">
            <div class="card-header bg-info">Publier Votre Post</div>
            <div class="container card-body">
                <form action=" {{ route('articles.store') }} " method="POST">
                    @csrf

                    <div class="form-group">
                        <textarea type="text" rows="5" class="form-control  @error('post_content') is-invalid @enderror" id="post_content"
                                  value="{{ old('post_content') }}" placeholder="Contenu de l'article" name="post_content"></textarea>
                        @error('post_content')
                        <div class="invalid-feedback">
                            {{$errors->first('post_content')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control @error('post_title') is-invalid @enderror" id="post_title"
                               value="{{ old('post_title') }}" placeholder="Titre" name="post_title">
                        @error('post_title')
                        <div class="invalid-feedback">
                            {{$errors->first('post_title')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control @error('post_status') is-invalid @enderror " id="post_status"
                               value="{{ old('post_status') }}" placeholder="Statut" name="post_status">
                        @error('post_status')
                        <div class="invalid-feedback">
                            {{$errors->first('post_status')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control @error('post_name') is-invalid @enderror " id="post_name"
                               value="{{ old('post_name') }}" placeholder="Nom de l'article" name="post_name">
                        @error('post_name')
                        <div class="invalid-feedback">
                            {{$errors->first('post_name')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control @error('post_type') is-invalid @enderror " id="post_type"
                               value="{{ old('post_type') }}" placeholder="Type de l'article" name="post_type">
                        @error('post_type')
                        <div class="invalid-feedback">
                            {{$errors->first('post_type')}}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control @error('post_category') is-invalid @enderror " id="post_category"
                               value="{{ old('post_category') }}" placeholder="Categorie de l'article" name="post_category">
                        @error('post_category')
                        <div class="invalid-feedback">
                            {{$errors->first('post_category')}}
                        </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Publier</button>
                </form>
            </div>

        </div>

    </div>


@endsection

