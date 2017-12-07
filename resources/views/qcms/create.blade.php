@extends('layouts.admin.master',['title'=>"Ajouter des Qcms au cours $course->title"])

@section('styles')
<style>


</style>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center">Ajouter des QCMs au cours <b>"<u>{{$course->title}}</u>"</b></h1>
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

    <form role="form" action="{{route('qcms.store')}}" method="POST" >
        {{csrf_field()}}
        <i>* Champ obligatoire</i>
        <div class="form-group">
          <label>Question*</label>
          <input type="text" name="question" class="form-control" placeholder="Question" required  value="{{old('question')}}">
        </div>
        <section style="background: #EEE; padding: 20px; margin-bottom: 10px" id="responses">
          <h5>Liste des réponses</h5>
          <div class="form-group">
            <label class="help"><i>Cocher la case si correct</i></label>
            <div class="input-group">
              <span class="input-group-addon primary">
                <input type="checkbox" name="responses[0][is_correct]" >
              </span>
              <input type="text" name="responses[0][content]" value="{{old('reponses[0][content]')}}" class="form-control" placeholder="Proposer une Réponse ..">
            </div>
          </div>
        </section>
        <div class="form-group">
          <button class="btn btn-primary" id="addAnswers">Ajouter des suggestions</button>
        </div>

        <div class="form-group">
          <label for="addQcm">Ajouter un autre QCM au cours {{$course->title}}</label>
          <input type="checkbox" name="addqcm" checked>
        </div>
        <input type="hidden" name="course" value="{{$course->slug}}">
        <div class="form-group">
          <button class="btn btn-block btn-complete">
            <i class="fa fa-save fa-lg"></i> Enregistrer
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
  var nb = 1;
  $('#addAnswers').click(function(e)
  {
    $('#responses').append('<div class="form-group">'
            +'<div class="input-group">'
            +  '<span class="input-group-addon primary">'
            +   '<input type="checkbox" name="responses['+nb+'][is_correct]" >'
            +  '</span>'
            +  '<input type="text" name="responses['+nb+'][content]" value="" class="form-control">'
            +'</div>'
          +'</div>')
      nb++
    e.preventDefault()
  })
</script>
@stop