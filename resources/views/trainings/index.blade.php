@extends('layouts.admin.master',['title'=>"Liste des formations"])


@section('content')
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
      <div id="tableWithSearch_wrapper" class="dataTables_wrapper no-footer">
        <div>
          <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch" role="grid" aria-describedby="tableWithSearch_info">
            <thead>
              <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Titre: activate to sort column ascending" style="width: 178px;">
                  Titre
                </th>
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 198px;">
                  Description
                </th>
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Difficulte: activate to sort column ascending" style="width: 108px;">
                  Difficulté
                </th>
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
                <td class="v-align-middle">
                  <p>{{str_limit($training->description,50)}}</p>
                </td>
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
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="alert alert-danger">Aucune formation n'a été ajoutée</div>
  @endif  
@endsection


