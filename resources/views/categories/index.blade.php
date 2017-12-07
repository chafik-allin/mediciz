@extends('layouts.admin.master',['title'=>"Liste des categories"])


@section('content')
  @if(count($categories)>0)
	<div class="card card-transparent">
		<div class="card-header ">
		  	<div class="text-center m-2"></div>
		  	<div class="clearfix"></div>
		  	<div class="card-title">Liste des categories</div>
			 <div class="col-xs-12">
			    <div class="pull-right">
			      	<a href="{{route('categories.create')}}" class="btn btn-success btn-cons">
			        	<i class="fa fa-plus"></i> Ajouter categorie
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
				            <th>Editer</th>
				            <th> Supprimer</th>
				          </tr>
			        	</thead>
				        <tbody>
				          @foreach($categories as $category)
				          	<tr>
					            <td class="v-align-middle semi-bold sorting_1 ">
					              <h6>
					                <a href="{{route('categories.show',$category)}}" class="btn btn-info" >
					                  {{$categoy->name}}
					                </a>
					              </h6>
					            </td> 
					            <td>
					              <a href="{{route('categories.edit',$category)}}" class="btn btn-lg btn-primary">
					              	<i class="fa fa-edit"></i>
					              </a>
					            </td>
					            <td>
					              	<form action="{{route('categories.destroy', $category)}}" method="post">
						                {{csrf_field()}}
						                {{method_field('delete')}}
					                	<button class="btn btn-danger btn-lg confirm">
					                		<i class="fa fa-trash"></i>  
					                	</button>
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
	      <div class="card-title">Liste des categories</div>
	      <div class="col-xs-12">
	        <div class="pull-right">
	          <a href="{{route('categories.create')}}" class="btn btn-success btn-cons">
	            <i class="fa fa-plus"></i> Ajouter categorie
	          </a>
	        </div>
	      </div>
	      <div class="clearfix"></div>
	    </div>
	    <div class="card-block"> 
	      <div class="alert alert-danger">Aucune catégorie n'a été ajoutée</div>
	    </div>
  	</div>
  @endif  
@endsection


