@extends('layouts.admin.master',['title'=>"Créer une entreprise"])


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
    <form role="form" action="{{route('companies.store')}}" method="POST">
      <i>* Champs obligatoire</i>
      <div class="form-group">
        <label>Nom de l'entreprise</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" required >
      </div>
      {{csrf_field()}}
      <div class="form-group">
        <label for="description">Description *</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{old('description')}}</textarea>
      </div>

      <div class="form-group">
        <label>Image de l'entreprise</label>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
              <i class="fa fa-picture-o"></i> Choisir
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="image" value="{{old('image')}}" required >
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;" src="{{old('image')}}" >
      </div>

      <div class="form-group">
        <label>CEO *</label>
        <span class="help">(Chef d'entreprise)</span>
        <input type="text" class="form-control" required name="founder" value="{{old('founder')}}" >
      </div>

      <div class="form-group">
        <label>Telephone *</label>
        <input type="text" class="form-control" placeholder="Numéro de telephone" required name="phone" value="{{old('phone')}}" >
      </div>

      <div class="form-group">
        <label>contact *</label>
        <span class="help">e.g. "contact@example.com"</span>
        <input type="email" class="form-control" placeholder="ex: some@example.com" required="" name="contact" value="{{old('contact')}}" >
      </div>
      
      <div class="form-group">
        <label>Adresse</label>
        <textarea name="adress" id="" cols="30" rows="10" class="form-control">{{old('adress')}}</textarea>
      </div>
      <div class="form-group">
        <button class="btn btn-block btn-success"><i class="fa fa-save fa-lg"></i> Ajouter</button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $('#lfm').filemanager('image');
</script>
@endsection