@extends('layouts.admin.master',['title'=>"Editer  le cours $course->title"])


@section('content')

<div class="container">
  <div class="row">
    <div class="col-8 offset-2">
      <h3>Modifier le cours  <b>"<u>{{$course->title}}</u>"</b></h3>
    </div>
  </div>
</div>
<div class="container">
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
    <div class="row">
      <div class="col-md-12">
        <div class="pull-right">
          <a href="{{route('qcms.create', ['course'=>$course])}}" class="btn btn-primary">Ajouter un QCM</a>
        </div>
      </div>
    </div>
    <hr style="width: 50px">
    <label for="">Liste des Qcms</label>
    <div class="row">
      @foreach($course->qcms as $qcm)
      <div class="col-md-4" >
        <div class="card card-default" id="top">
          <div class="card-header">
            <div class="card-title ">{{$qcm->question}}</div>
          </div>
          <div class="card-block">
            <ul style="list-style-type: none">
            @foreach($qcm->Answers as $answer)
              @if($answer->is_correct)
              <li  class="text-success " >{{$answer->content}} <i class="fa fa-check"></i></li>
              @else
              <li  class="text-danger" >{{$answer->content}} <i class="fa fa-close"></i></li>
              @endif
            @endforeach
            </ul>
            <a href="{{route('qcms.edit', $qcm)}}" class="btn btn-default btn-block" >Modifier ce QCM</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>
@endsection
