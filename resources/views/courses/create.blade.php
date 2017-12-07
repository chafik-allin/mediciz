@extends('layouts.admin.master',['title'=>"Créer un cours"])


@section('content')
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2">
        <h1>Ajouter un cours à la formation <b>"<u>{{$training->title}}</u>"</b></h1>
      </div>
    </div>
  </div>
<div class="card card-default mt-5" id="top">
  <div class="card-header">
    <div class="card-title">
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

    <form role="form" action="{{route('courses.store')}}" method="POST" >
        {{csrf_field()}}
        <i>* Champ obligatoire</i>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label>Titre*</label>
              <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Titre de la formation" required >
            </div>
            <div class="col-md-6">
              <label>Lien de la Vidéo*</label>
              <input type="text" name="video" class="form-control" placeholder="Lien de la video" required value="{{old('video')}}">  
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="training">Formation</label>
              <select name="training" id="training" class="form-control">
                <option value="{{$training->slug}}" >{{$training->title}}</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Nombre d'heures*</label>
              <input type="number" min="0" class="form-control" name="hours" placeholder="Nombre d'heures" required  value="{{old('hours')}}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="description">Description </label>
          <textarea name="description" id="description" cols="30" rows="10" class="form-control ">{{old('description')}}</textarea>
        </div>

        <div class="form-group">
          <label for="addQcm">Ajouter des QCMs à ce cours</label>
          <input type="checkbox" name="addqcm" checked>
        </div>
        <div class="form-group">
          <button class="btn btn-block btn-complete">
            <i class="fa fa-save fa-lg"></i> Enregistrer le cours
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
