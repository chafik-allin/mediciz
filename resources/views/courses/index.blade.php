  @extends('layouts.admin.master',['title'=>"Liste des cours"])


@section('content')
  @if(count($courses)>0)
  <div class="card card-transparent">
    <div class="card-header ">
      <div class="text-center m-2">
      </div>
      <div class="clearfix"></div>
      <div class="card-title">Liste des cours</div>
      <div class="col-xs-12">
        <div class="pull-right">
          <a href="{{route('courses.create')}}" class="btn btn-success btn-cons">
            <i class="fa fa-plus"></i> Ajouter un cours
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
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 198px;">
                  Description
                </th>
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Difficulte: activate to sort column ascending" style="width: 108px;">
                  video
                </th>
                <th>Editer</th>
                <th> Supprimer</th>
              </tr>
            </thead>
            <tbody>
              @foreach($courses as $course)
              <tr>
                <td class="v-align-middle semi-bold sorting_1 ">
                  <h6><a href="{{route('courses.show',$course)}}" class="btn btn-info" >{{$course->title}}</a></h6>
                </td> 
                <td class="v-align-middle">
                  <p>{{str_limit($course->description,50)}}</p>
                </td>
                <td class="v-align-middle">
                  Lien video
                </td>
                <td>
                  <a href="{{route('courses.edit',$course)}}" class="btn btn-lg btn-primary"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                  <form action="{{route('courses.destroy', $course)}}" method="post">
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
 <div class="card card-transparent">
    <div class="card-header ">
      <div class="text-center m-2">
      </div>
      <div class="clearfix"></div>
      <div class="card-title">Liste des cours</div>
      <div class="col-xs-12">
        <div class="pull-right">
          <a href="{{route('courses.create')}}" class="btn btn-success btn-cons">
            <i class="fa fa-plus"></i> Ajouter un cours
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="card-block"> 
      <div class="alert alert-danger">Aucun cours n'a été ajouté</div>
    </div>
  </div> 


  @endif  
@endsection


