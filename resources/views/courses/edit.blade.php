@extends('layouts.admin.master',['title'=>"Editer  le cours $course->title"])

@section('styles')

<style>
  form{
    width: 80%;
    margin: 0 auto;
    background: #f5f5f5;
    padding: 20px;
  }
</style>

@endsection
@section('content')
  
  <div class="container">
    <div class="row">
      <ul class="breadcrumb p-l-0">
        <li class="breadcrumb-item">
          <a href="{{route('trainings.show',$course->training)}}"> {{$course->training->title}}</a>
        </li>
        <li class="breadcrumb-item active text-success">
          {{$course->title}}
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-8 offset-2">
        <h3>Modifier le cours  <b>"<u>{{$course->title}}</u>"</b></h3>
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

    <form role="form" action="{{route('courses.update', $course)}}" method="POST" >
        {{csrf_field()}}
        {{method_field('put')}}
        <i>* Champ obligatoire</i>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label>Titre*</label>
              <input type="text" name="title" class="form-control" value="{{$course->title}}" placeholder="Titre de la formation" required >
            </div>
            <div class="col-md-6">
              <label>Lien de la Vidéo*</label>
              <input type="text" name="video" class="form-control" placeholder="Lien de la video" required value="{{$course->video}}">  
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="training">Formation</label>
              <select name="training" id="training" class="form-control">
                <option value="{{$course->training->slug}}" >{{$course->training->title}}</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Nombre d'heures*</label>
              <input type="number" min="0" class="form-control" name="hours" placeholder="Nombre d'heures" required  value="{{$course->hours}}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="description">Description </label>
          <textarea name="description" id="description" cols="30" rows="10" class="form-control ">{{$course->description}}</textarea>
        </div>
        
        @if(request()->has('redirect'))
        <input type="hidden" value="{{request()->redirect}}" name="redirect" >
        @endif

        <div class="form-group">
          <button class="btn btn-block btn-complete">
            <i class="fa fa-save fa-lg"></i> Mettre à jours
          </button>
        </div>

        <a href="{{route('courses.qcms', ['course'=>$course->slug])}}" target="_blank" class="btn btn-primary btn-block" >Afficher et Modifier les QCMs</a>
      </div>
    </form>
    <hr>
  </div>
</div>
@endsection
