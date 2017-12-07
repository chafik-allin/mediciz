@extends('layouts.admin.master',['title'=>"Liste des utilisateurs"])


@section('content')
  @if(count($users)>0)
  <div class="card card-transparent">
    <div class="card-header ">
      <div class="text-center m-2">
      </div>
      <div class="clearfix"></div>
      <div class="card-title">Liste des utilisateurs</div>
      <div class="col-xs-12">
        <div class="pull-right">
          <a href="{{route('register')}}" class="btn btn-success btn-cons">
            <i class="fa fa-plus"></i> Ajouter utilisateur
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
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="email: activate to sort column ascending" style="width: 198px;">
                  Email
                </th>
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="role: activate to sort column ascending" style="width: 108px;">
                  Role
                </th>
                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="entreprise: activate to sort column ascending" style="width: 108px;">
                  Entreprise
                </th>

                <th>Editer</th>
                <th> Supprimer</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td class="v-align-middle semi-bold sorting_1 ">
                  <h6><a href="{{route('users.show',$user)}}" class="btn btn-info" >{{$user->name}}</a></h6>
                </td> 
                <td class="v-align-middle">
                  <p>{{$user->email}}</p>
                </td>
                <td class="v-align-middle">
                	@forelse($user->roles as $role)
						<div class="label label-info">{{$role->name}}</div>
                	@empty
						<div class="label label-info">Etudiant</div>
                	@endif
                </td>
                <td class="v-align-middle">
                	@if($user->company)
                	<a href="{{route('companies.show',$user->company->slug)}}">	{{$user->company->name}}</a>
                	@else
                		<p>NULL</p>
                	@endif
                </td>
                <td>
                  <a href="{{route('users.edit',$user)}}" class="btn btn-lg btn-primary"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                  <form action="{{route('users.destroy', $user)}}" method="post">
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
      <div class="card-title">Liste des Utilisateurs</div>
      <div class="col-xs-12">
        <div class="pull-right">
          <a href="{{route('users.create')}}" class="btn btn-success btn-cons">
            <i class="fa fa-plus"></i> Ajouter un Utilisateur
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="card-block"> 
      <div class="alert alert-danger">Aucun utilisateur n'a été ajouté</div>
    </div>
  </div>
  @endif  
@endsection


