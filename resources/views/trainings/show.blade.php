@extends('layouts.admin.master')

@section('content')

<div class="page-content-wrapper">
	<div class="">
		<div class="social-wrapper">
			<div class="social " data-pages="social">
				<div class="jumbotron" data-pages="parallax" data-social="cover" >
					<div class="cover-photo" style="background-image: url({{asset($training->cover)}}); background-position: center center">	
					</div>
					<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20" >
						<div class="inner" >
							<div class="pull-bottom bottom-left m-b-40">
								<div class="col-md-12" >
									<h1 class="text-white no-margin">
										<span class="bold">{{$training->title}}</span>
									</h1>
									<p class="text-white" style="text-align: justify;">
										{{$training->description}}
									</p>
									<br>
									<div class="">
										<label class="text-white">Tags: </label>
										@foreach($training->tags as $tag)
										<span class="label label-info" style="display: inline-block;">
											{{$tag->name}}
										</span>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container">    			
			    @if(session('success'))
      				<div class="alert alert-success">{{session('success')}}</div>
    			@endif
					<div class="card-group horizontal" id="accordion">
						<div class="card card-default">
							<div class="card-header " role="tab" id="headingOne">
								<h4 class="card-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
										Certification de la formation.
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="collapse" role="tabcard" aria-labelledby="headingOne" aria-expanded="false" style="">
								<div class="card-block">
									Click headers to expand/collapse content that is broken into logical sections, much like tabs. Optionally, toggle sections open/closed on mouseover.
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class=" container-fluid   container-fixed-lg bg-white">
					<div class="card card-transparent">
						<div class="card-header ">
							<div class="card-title">
								<h4 class="text-success bold">{{ $training->courses()->count()}}  cours</h4>
							</div>
							@if(request()->user()->isSuperAdmin())
							<div class=" pull-right m-b-10 m-l-20">
								<div class="dropdown dropdown-default">
									<button class="btn btn-success dropdown-toggle text-center" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 201px;">
										Ajouter
									</button>
									<div class="dropdown-menu" style="">
										<a class="dropdown-item" href="{{route('courses.create', ['formation'=>$training])}}">Nouveau cours</a>
										<a class="dropdown-item" href="/admin_creatcour">Certificat </a>
									</div>
								</div>
							</div>
							@endif

							<div class=" pull-right m-b-10 m-l-20">
								<a href="{{route('trainings.attachusers', ['training'=>$training])}}" class="btn btn-success text-white" >
									attacher à des utilisateurs
								</a>
							</div>
							<div class="pull-right">
								<div class="col-xs-12">
									<input type="text" id="search-table" class="form-control" placeholder="Search">
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
								 			<th style="" class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Cours: activate to sort column ascending">
								 				Cours
								 			</th>
								 			<th>Description</th>
								 			<th style="width: 5px" class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="heurs: activate to sort column ascending">
								 				#heures
								 			</th>
								 			<th style="width:5px" class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="n# de questions: activate to sort column ascending">
								 				#Questions
								 			</th>
							 			@if(Auth::user()->isSuperAdmin())
								 			<th style="" class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="video: activate to sort column ascending">
								                Vidéo
								            </th>
								            <th style="" class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="date d'ajout: activate to sort column ascending">
								            	Date d'ajout
								            </th>
								            <th>Editer</th>
								            <th>Supprimer</th>
							            @endif
							        </tr>
							    </thead>
							    <tbody>
							    	@foreach($training->courses as $course)
						            <tr role="row" class="odd">
						              <td class="v-align-middle">
						                <a href="{{route('courses.show',$course)}}">
						                  <h4 class="semi-bold text-success" >{{$course->title}}</h4>
						                </a>
						              </td>
						              <td class="v-align middle"><p>{{str_limit($course->description,50)}}</p></td>
						              <td class="v-align-middle">
						                <h4 class="semi-bold">{{$course->hours}}</h4>
						              </td>
						              <td class="v-align-middle">
						                <h4 class="semi-bold">{{$course->qcms()->count()}}</h4>
						              </td>
						             @if(Auth::check() && Auth::user()->isSuperAdmin())
						              <td class="v-align-middle">
						                <a href="{{$course->video}}">{{$course->video}}</a>
						              </td>
						              <td class="v-align-middle">
						                <p>{{$course->created_at}}</p>
						              </td>
						              <td>
						                <a href="{{route('courses.edit', $course)}}" class="btn btn-primary">
						                  <i class="fa fa-edit"></i>
						                </a>
						              </td>
						              <td>
						                <form action="{{route('courses.destroy', $course)}}" method="POST">
						                  {{csrf_field()}}
						                  {{method_field('delete')}}
						                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
						                </form>
						              </td>
						              @endif
						            </tr>
						            @endforeach
						          </tbody>
						        </table>
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection