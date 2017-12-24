@extends('layouts.admin.master',['title'=>$course->title])

@section('content')
<div class="social-wrapper">
  <div class=" container-fluid   container-fixed-lg">
    <ul class="breadcrumb p-l-0">
      <li class="breadcrumb-item">
        <a href="{{route('trainings.show',$course->training)}}">{{$course->training->title}}</a>
      </li>
      <li class="breadcrumb-item active text-success">
        {{$course->title}}
      </li>
    </ul>
  </div>
  
    @if(session('success'))
      <div class="alert alert-success">{{session('success')}}</div>
    @endif

  <div class="social " data-pages="social">
    <div class="jumbotron p-b-0" data-pages="parallax" data-social="cover">
      {!! LaravelVideoEmbed::parse($course->video,['YouTube', 'Vimeo'],['autoplay' => 0],['width'=>'100%','height'=>'100%']) !!}
    </div>
  </div>
  <div class="container " style="position: relative;">
    <h2 class="bold text-success"> {{$course->title}}</h2>
    <p>{{$course->description}}</p>
    <hr>
    <form action="frontFormation_submit" method="get" accept-charset="utf-8">
      @foreach($course->qcms as $qcm)
      <div class="container card-transparent">
        <div class="form-group">
          <h2 style="display:inline-block">{{$qcm->question}}</h2>
        
          @foreach($qcm->answers()->inRandomOrder()->get() as $answer)
          <div class="checkbox check-success checkbox-circle">
            <input type="checkbox" value="{{$answer->id}}" id="checkbox{{$answer->id}}" @if(Auth::user()->is('admin') || Auth::user()->is('superadmin')) disabled @if($answer->is_correct) checked @endif  @endif >
            <label for="checkbox{{$answer->id}}">{{$answer->content}}</label>
          </div>
          @endforeach
          @if(Auth::user()->isSuperadmin())
            <a href="{{route('qcms.edit', $qcm)}}" class="btn btn-complete ">
              <i class="fa fa-edit"></i> 
            </a>
            <form action="{{route('qcms.destroy',$qcm)}}" method="POST" class="d-inline-block">
              {{csrf_field()}}
              {{method_field('delete')}}
              <button class="btn btn-danger confirm"><i class="fa fa-trash"></i> </button>
            </form>
          @endif
    
        </div>
      </div>      
      @if(!$loop->last)
      <hr>
      @endif
      @endforeach
      
      @if(Auth::user()->isStudent())
        <button class="btn btn-lg btn-rounded btn-primary m-r-20 m-b-10" style="position: fixed; bottom: 100px; right: 50px;">Proceder</button>
    @endif
    @if( Auth::user()->isSuperAdmin())
    <a href="{{route('courses.edit',['id'=>$course, 'redirect'=>route('courses.show',$course)])}}" class="btn btn-lg btn-rounded btn-primary m-r-20 m-b-10" style="position: fixed; bottom: 100px; right: 50px;">
      <i class="fa fa-pen"></i> Modifier
    </a>
    @endif
    </form>
 
  </div>
</div>

@endsection