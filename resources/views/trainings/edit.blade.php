@extends('layouts.admin.master',['title'=>"Modifier la formation $training->title"])


@section('styles')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.css')}}">
@endsection

@section('content')
<div class="card card-default mt-5">
  <div class="card-header ">
    <div class="card-title">
      Modifier la formation {{$training->title}}
    </div>
    <div class="pull-right">
      <a href="{{route('trainings.courses', ['formation'=>$training])}}" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter des cours</a>
      <a href="{{route('trainings.courses', $training)}}" class="btn btn-info">
        <i class="fa fa-edit"></i> 
        Modifier des cours
      </a>
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



     <form role="form" action="{{route('trainings.update',$training)}}" method="POST" id="form">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <i>* Champ obligatoire</i>

      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            <label>Nom de la formation* </label>
            <input type="text" name="title" class="form-control" value="{{$training->title}}" required >
          </div>
          <div class="col-md-6">
            <label>Difficulté*</label>
            <select name="difficulty" class="form-control">
              <option value="easy">Facile</option>
              <option value="medium">Moyen</option>
              <option value="hard">Difficile</option>
            </select>
          </div>
        </div>
      </div>
            
      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            <label>Image couverture de la formation* </label>
            <div class="input-group">
              <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                  <i class="fa fa-picture-o"></i> Choisir
                </a>
              </span>
              <input id="thumbnail" class="form-control" type="text" name="cover" value="{{$training->cover}}" required >
            </div>
            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$training->cover}}" >
          </div>
          <div class="col-md-6">
            <label for="category">Choisir une Categorie*</label>
            <select name="category_id" id="category" class="form-control">
              <option value="{{$training->category->id}}">{{$training->category->name}}</option>
              @foreach($categories as $category)
                @continue($category->id == $training->category->id)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    
      <div class="form-group">
        <label for="">Tags</label>
        <span class="help"><i>Appuyez sur Entré pour valider</i></span>
        @php
        $t = "";
        foreach($training->tags as $tag)
          $t = $t.','.$tag->name;
        @endphp
        <input id="#tagsinput" type="text" value="{{ $t }}" data-role="tagsinput" class="form-control"  name="tags"/>
      </div>
    
      <div class="form-group">
        <label for="description">Description </label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Décrire la formation en quelques lignes?" >{{$training->description}}</textarea>
      </div>


      <div class="form-group">
          <button class="btn btn-success btn-block"><i class="fa fa-send fa-lg"></i> Enregistrer</button>
      </div>
    </form>

  </div>
</div>
  

@endsection

@section('scripts')
<script>
  $(document).ready(function() 
  {
    $('#lfm').filemanager('image');
    $('#tagsinput').tagsinput();
});

</script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js')}}"></script>
@endsection
