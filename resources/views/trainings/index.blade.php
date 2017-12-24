@extends('layouts.admin.master',['title'=>"Liste des formations"])


@section('content')
{{--
  @if(count($trainings)>0)
  <div class="card card-transparent">
    <div class="card-header ">
      <div class="text-center m-2">
      </div>
      <div class="clearfix"></div>
      <div class="card-title">Liste des formations</div>
      <div class="col-xs-12">
        <div class="pull-right">
          <a href="{{route('trainings.create')}}" class="btn btn-success btn-cons">
            <i class="fa fa-plus"></i> Ajouter une formation
          </a>
        </div>
        <div class="pull-right mr-2">
          <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="card-block">
        @if(session('success'))
      <div class="alert alert-success">{{session('success')}}</div>
    @endif

      <div id="tableWithSearch_wrapper" class="dataTables_wrapper no-footer">
        <div>
          <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch" role="grid" aria-describedby="tableWithSearch_info">
            <thead>
              <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Titre: activate to sort column ascending" style="width: 178px;">
                Titre
                </th>
                <th>Couverture</i></th>
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 198px;">
                 Description
                </th>
                <th>#Cours</th>
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Difficulte: activate to sort column ascending" style="width: 108px;">
                  Difficulté
                </th>
                <th>Tags</th>
                <th>Durée</th>
                <th>Editer</th>
                <th> Supprimer</th>
              </tr>
            </thead>
            <tbody>
              @foreach($trainings as $training)
              <tr>
                <td class="v-align-middle semi-bold sorting_1 ">
                  <h6><a href="{{route('trainings.show',$training)}}" class="btn btn-info" >{{$training->title}}</a></h6>
                </td> 
                <td><img src="{{getThumbnail($training->cover)}}" alt="" width="128" height="auto"></td>
                <td class="v-align-middle">
                  <p>{{str_limit($training->description,50)}}</p>
                </td>
                <td class="v-align-middle">{{$training->courses()->count()}}</td>
                <td class="v-align-middle">
                  @if($training->difficulty == "easy")
                  <div class="progress ">
                    <div class="progress-bar progress-bar-success" style="width:25%"></div>
                  </div>
                  <p class="text-center">Facile</p>
                  @elseif($training->difficulty == "medium")
                  <div class="progress ">
                    <div class="progress-bar progress-bar-warning" style="width:50%"></div>
                  </div>
                  <p class="text-center">Moyenne</p>
                  @else
                  <div class="progress ">
                    <div class="progress-bar progress-bar-danger" style="width:75%"></div>
                  </div>
                  <p class="text-center">Difficile</p>
                  @endif
                </td>
                <td>@foreach($training->tags as $tag) <div class="label label-info d-inline-block ">{{$tag->name}}</div> @endforeach</td>
                <td>{{$training->hours}}</td>
                <td>
                  <a href="{{route('trainings.edit',$training)}}" class="btn btn-lg btn-primary"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                  <form action="{{route('trainings.destroy', $training)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <button class="btn btn-danger btn-lg confirm"><i class="fa fa-trash"></i>  </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-md-12">
              {{$trainings->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
 <div class="card card-transparent">
    <div class="card-header ">
      <div class="text-center m-2">
      </div>
      <div class="clearfix"></div>
      <div class="card-title">Liste des formations</div>
      <div class="col-xs-12">
        <div class="pull-right">
          <a href="{{route('trainings.create')}}" class="btn btn-success btn-cons">
            <i class="fa fa-plus"></i> Ajouter formation
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="card-block"> 
      <div class="alert alert-danger">Aucune formation n'a été ajoutée</div>
    </div>
  </div> 
  @endif  
--}}

<div class="page-content-wrapper">
  <div class="p-2">
    <div class="social-wrapper">
      <div class="card card-default">
        <div class="card-header ">
          <div class="card-title bold">
            <h3 class="bold text-success">GalLerie de Formations</h3>
          </div>
        </div>
        <div class="card-block" id="MixItUp4DE0DA">
          <div class="row">
            <div class="col-md-4">
              <p>
                Ici, vous pouvez voir toutes vos formations, chaque formation a ses spécifications, Descreption, tutor, et le temps, plus vous pouvez filtrer, rechercher, ajouter ou supprimer les formations listées 
              </p>
            </div>
            @if(Auth::user()->isSuperAdmin())
            <div class="offset-md-4 col-md-4">
              <a href="{{route('trainings.create')}}">
                <button class="btn btn-primary  text-center" type="button" style="width: 100%; height: 55px;">
                          Ajouter une nouvelle formation
                </button>
              </a>            
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        @forelse($trainings as $training)
        <div class="col-md-4 ">
        @component('components.training', ['training'=>$training]) @endcomponent
        </div>
        @empty
        <div class="col-md-12">      
          <div class="alert alert-info text-center">
            Aucune formation
          </div>
        </div>
        @endforelse

      </div>
    </div>
  </div>
</div>  
@endsection



@section('scripts')
  <script>
    $('.attach-companies').click(function(e){
      $(this).parent().append("<form method=\"POST\" action=\"{{route('trainings.attach')}}\" >"
                                +'{{csrf_field()}}'
                                +'<p class="help">Maintenez CTRL pour choisir plusieur</p>'
                                +'<select class="form-control" name="companies[]" multiple>'
                                @if(request()->user()->isSuperAdmin())
                                  @foreach(DB::table('companies')->get() as $company)
                                  +'<option value="{{$company->id}}">{{$company->name}}</option>'
                                  @endforeach
                                @endif
                                +'</select>'
                                +'<input type="hidden" name="training" value="'+$(this).attr('id')+'">'
                                +'<button class="btn btn-primary btn-block">Ajouter</button>'
                              +'</form>');
      e.preventDefault();
      $(this).hide();
    })

    $('.attach-users').click(function(e){
      $(this).parent().append('<form method="POST" action="#">'
                                +'{{csrf_field()}}'
                                +'<p class="help">Maintenez CTRL pour choisir plusieur</p>'
                                +'<select class="form-control" multiple >'
                                @if(request()->user()->isAdmin())
                                  @foreach(request()->user()->company->users as $user)
                                    @continue(request()->user()->id == $user->id)
                                    +'<option>{{$user->name}}</option>'
                                  @endforeach
                                @endif
                                +'</select>'
                                +'<button class="btn btn-primary btn-block">Ajouter</button>'
                              +'</form>');
      e.preventDefault();
      $(this).hide();
    })
  </script>
@endsection
