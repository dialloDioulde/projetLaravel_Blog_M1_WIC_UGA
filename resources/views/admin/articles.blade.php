@extends('layouts.app')
@section('content')
           <table class="table table-bordered">
               <thead class="bg-info">
               <tr>
                   <th scope="col">Nom</th>
                   <th scope="col">Titre</th>
                   <th scope="col">Contenu</th>
                   <th scope="col">Statut</th>
                   <th scope="col">Categorie</th>
                   <th scope="col"></th>
                   <th scope="col"></th>
               </tr>
               </thead>

               <tbody>
               @foreach($articles as $article)
                   <tr>
                       <td>{{$article->post_name}}</td>
                       <td>{{$article->post_title}}</td>
                       <td>{{$article->post_content}}</td>
                       <td>{{$article->post_status}}</td>
                       <td>{{$article->post_category}}</td>
                       <td><a class="btn btn-warning" href="{{route('articles.edit', $article->id )}}">Modifier</a></td>
                       <td>
                           <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger">Supprimer</button>
                           </form>
                       </td>
                   </tr>
               @endforeach
               </tbody>
           </table>
@endsection
