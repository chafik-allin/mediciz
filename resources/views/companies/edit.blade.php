@extends('layouts.admin.master',['title'=>"Modifier l'entreprise $company->name"])


@section('content')
<div class="card card-default mt-5">
  <div class="card-header ">
    <div class="card-title">
      Modifier l'entreprise {{$company->name}}
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
    <form role="form" action="{{route('companies.update',$company)}}" method="POST">
  {{csrf_field()}}
  {{method_field('put')}}
      <i>* Champs obligatoire</i>
      <div class="form-group">
        <label>Nom de l'entreprise</label>
        <input type="text" name="name" class="form-control" value="{{$company->name}}" required >
      </div>
      <div class="form-group">
        <label for="description">Description *</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{$company->description}}</textarea>
      </div>

      <div class="form-group">
        <label>Image de l'entreprise</label>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
              <i class="fa fa-picture-o"></i> Choisir
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="image" value="{{asset($company->image)}}" required >
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;" src="{{asset($company->image)}}" >
      </div>

      <div class="form-group">
        <label>CEO *</label>
        <span class="help">(Chef d'entreprise)</span>
        <input type="text" class="form-control" required name="founder" value="{{$company->founder}}" >
      </div>

      <div class="form-group">
        <label>Telephone *</label>
        <input type="text" class="form-control" placeholder="Numéro de telephone" required name="phone" value="{{$company->phone}}" >
      </div>

      <div class="form-group">
        <label>contact *</label>
        <span class="help">e.g. "contact@example.com"</span>
        <input type="email" class="form-control" placeholder="ex: some@example.com" required="" name="contact" value="{{$company->contact}}" >
      </div>
      
      <div class="form-group">
        <label>Adresse</label>
        <textarea name="adress" id="" cols="30" rows="10" class="form-control">{{$company->adress}}</textarea>
      </div>
      <div class="form-group">
        <button class="btn btn-block btn-success"><i class="fa fa-save fa-lg"></i> Modifier</button>
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