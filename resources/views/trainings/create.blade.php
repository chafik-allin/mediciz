@extends('layouts.admin.master',['title'=>"Créer une formation"])


@section('styles')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.css')}}">
@endsection

@section('content')
<div class="card card-default mt-5">
  <div class="card-header ">
    <div class="card-title">
      Ajouter une formation
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



     <form role="form" action="{{route('trainings.store')}}" method="POST" id="form">
      {{csrf_field()}}
      <i>* Champ obligatoire</i>

      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            <label>Nom de la formation* </label>
            <input type="text" name="title" class="form-control" value="{{old('title')}}" required >
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
              <input id="thumbnail" class="form-control" type="text" name="cover" value="{{old('cover')}}" required >
            </div>
            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{old('cover')}}" >
          </div>
          <div class="col-md-6">
            <label for="category">Choisir une Categorie*</label>
            <select name="category_id" id="category" class="form-control">
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    
      <div class="form-group">
        <label for="">Tags</label>
        <span class="help"><i>Appuyez sur Entré pour valider</i></span>
        <input id="#tagsinput" type="text" value="{{old('tags')}}" data-role="tagsinput" class="form-control"  name="tags"/>
      </div>
    
      <div class="form-group">
        <label for="description">Description </label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Décrire la formation en quelques lignes?" >{{old('description')}}</textarea>
      </div>

      <div class="form-group">  
        <label for="addCourses">Ajouter des cours apres l'enregistrement</label>
        <input type="checkbox" name="addCourses" checked id="addCourses">
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
