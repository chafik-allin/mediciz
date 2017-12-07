@extends('layouts.admin.master',['title'=>"Créer une nouvelle catégorie"])


@section('content')
<div class="card card-default mt-5">
  <div class="card-header ">
    <div class="card-title">
      Ajouter une entreprise
    </div>
  </div>
  <div class="card-block">
    @if(count($errors->all())>0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session('success'))
      <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <form role="form" action="{{route('categories.store')}}" method="POST">
      <i>* Champs obligatoire</i>
      <div class="form-group">
        <label>Nom </label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Nom de catégorie" required >
      </div>
      {{csrf_field()}}
      <div class="form-group">
        <label for="description">Description </label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control"  placeholder="Décrire la categorie (facultatif)">{{old('description')}}</textarea>
      </div>

      <div class="form-group">
        <button class="btn btn-block btn-success"><i class="fa fa-save fa-lg"></i> Ajouter</button>
      </div>
    </form>
  </div>
</div>
@endsection

