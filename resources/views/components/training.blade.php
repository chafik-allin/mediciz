@if(isset($training))
<div class="card card-default ">
  <div class="alert alert-danger">Cette formation n'est attaché à aucune certificat</div>

   <div class="card-header  separator">
    @if(Auth::check() && Auth::user()->isSuperAdmin())
    <div class="card-controls" data-target="#modalSlideLeft" data-toggle="modal">
      <ul>
        <li>
          <a href="{{route('trainings.edit',$training)}}" class="btn btn-primary">
            <i class="fa fa-edit"></i>
          </a>
        </li>
        <li>
          <form action="{{route('trainings.destroy', $training)}}" method="post">
            {{csrf_field()}}
            {{method_field('delete')}}
            <button class="btn btn-danger confirm">
              <i class="card-icon card-icon-close"></i>
            </button>
          </form>
        </li>
      </ul>
    </div>
    @endif
    <div class="card-title bold text-primary">
        {{$training->Companies()->count()}} <i class="fa fa-building"></i>
    </div>
   
    <div class="card-title bold">{{$training->users()->count()}} <i class="fa fa-users"></i> </div>
    <div class="card-title bold text-success"> 
      @if($training->certificate()->count()>0)
        {{$training->certificate()->users()->count()}} <i class="fa fa-check"></i> 
      @endif
    </div>
  </div>
  
  <a href="{{route('trainings.show',$training)}}"> 
    <div class="cover-photo">
      <img class="image-responsive-height " src="{{getThumbnail($training->cover)}}" alt="" >
    </div>
  </a>

  <div class="card-block">
    <h3><span class="semi-bold">{{$training->title}}</span> </h3>
    <h5 class="semi-bold">Mahdi Nabil, Ali Benabbes</h5>
    <div class="card-title bold text-primary">
      <i class="fa  fa-clock-o"></i> {{$training->hours}} heures
    </div>
   @if($training->difficulty == "easy")
    <p class="text-center">Facile</p>
    <div class="progress ">
      <div class="progress-bar progress-bar-success" style="width:25%"></div>
    </div>
    @elseif($training->difficulty == "medium")
    <p class="text-center">Moyenne</p>
    <div class="progress ">
      <div class="progress-bar progress-bar-warning" style="width:50%"></div>
    </div>
    @else
    <p class="text-center">Difficile</p>
    <div class="progress ">
      <div class="progress-bar progress-bar-danger" style="width:75%"></div>
    </div>
    @endif
    <p>
      {{str_limit($training->description,50)}}
    </p>
    <br>
    @foreach($training->tags as $tag) 
    <button class="btn btn-tag   btn-tag-light btn-tag-rounded m-r-5 m-b-10">
      {{$tag->name}}
    </button>
    @endforeach

  </div>
  @if(Auth::check() && Auth::user()->isAdmin())
  <div class="card-footer" style="padding: 0px">
    <form action="{{route('companies.subscribe')}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="training" value="{{$training->slug}}">
      <button href="#" class="btn btn-success btn-block " style="border-radius: 0">
        Demander cette formation
      </button>
    </form>
  </div>
  @endif
</div>
@else
  <div class="card card-default">
      Training NOT FOUND!
  </div>
@endif