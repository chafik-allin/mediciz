@extends('layouts.admin.master',['title'=>"Liste des entreprises"])


@section('content')
  @if(count($companies)>0)
  <div class="card card-transparent">
    <div class="card-header ">
      <div class="text-center m-2">
      </div>
      <div class="clearfix"></div>
      <div class="card-title">Liste des entreprises</div>
      <div class="col-xs-12">
        <div class="pull-right">
          <a href="{{route('companies.create')}}" class="btn btn-success btn-cons">
            <i class="fa fa-plus"></i> Ajouter entreprise
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
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Nom: activate to sort column ascending" style="width: 178px;">
                  Nom
                </th>
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 198px;">
                  Description
                </th>
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Fondateur: activate to sort column ascending" style="width: 108px;">
                  Fondateur
                </th>
                 <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="formations: activate to sort column ascending" style="width: 108px;">
                  #Formations
                </th>
                <th>Editer</th>
                <th> Supprimer</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companies as $company)
              <tr>
                <td class="v-align-middle semi-bold sorting_1 ">
                  <h6>
                    <a href="{{route('companies.show',$company)}}" class="btn btn-info" >
                      {{$company->name}}
                    </a>
                  </h6>
                </td> 
                <td class="v-align-middle">
                  <p>{{str_limit($company->description,50)}}</p>
                </td>
                <td class="v-align-middle">
                  <p>{{$company->founder}}</p>
                </td>
                <td class="v-align-middle">{{$company->Trainings()->count()}}</td>
                <td>
                  <a href="{{route('companies.edit',$company)}}" class="btn btn-lg btn-primary"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                  <form action="{{route('companies.destroy', $company)}}" method="post">
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
      <div class="card-title">Liste des entreprises</div>
      <div class="col-xs-12">
        <div class="pull-right">
          <a href="{{route('companies.create')}}" class="btn btn-success btn-cons">
            <i class="fa fa-plus"></i> Ajouter entreprise
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="card-block"> 
      <div class="alert alert-danger">Aucune entreprise n'a été ajoutée</div>
    </div>
  </div>
  @endif  
@endsection


