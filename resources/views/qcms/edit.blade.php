@extends('layouts.admin.master',['title'=>"Modifier le qcm du cours $qcm->course->title"])

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8 offset-2">
      <h1>Modifier le QCM du cours <b>"<u>{{$qcm->course->title}}</u>"</b></h1>
    </div>
  </div>
</div>

<div class="card card-default mt-5" id="top">
  <div class="card-header">
    <div class="card-title"></div>
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

    <form role="form" action="{{route('qcms.update', $qcm)}}" method="POST" >
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group">
          <label>Question*</label>
          <input type="text" name="question" class="form-control" placeholder="Question" required  value="{{$qcm->question}}">
        </div>
        <section style="background: #EEE; padding: 20px; margin-bottom: 10px" id="responses">
          <h5>Liste des réponses</h5>
            <label class="help"><i>Cocher la case si correct, Laisser vide pour supprimer</i></label>
            @foreach($qcm->answers as $answer)
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon primary">
                  <input type="checkbox" name="responses[{{$loop->index}}][is_correct]" @if($answer->is_correct) checked @endif >
                </span>
                <input type="text" name="responses[{{$loop->index}}][content]" value="{{$answer->content}}" class="form-control">
              </div>
            </div>
            @endforeach
        </section>
        <div class="form-group">
          <button class="btn btn-primary" id="addAnswers">Ajouter des suggestions</button>
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

@section('scripts')
<script>
  var nb = {{count($qcm->answers)}}
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