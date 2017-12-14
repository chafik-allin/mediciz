@extends('layouts.admin.master')

@section('content')

<div class="row">
	<div class="col-md-3 m-b-10">
		<div class="widget-9 card no-border bg-success no-margin widget-loader-bar">
			<div class="full-height d-flex flex-column">
				<div class="card-header ">
					<div class="card-title text-black">
						<span class="font-montserrat fs-11 all-caps">
							Nombre d'Entreprises <i class="fa fa-chevron-right"></i>
						</span>
					</div>
					<div class="card-controls">
						<ul>
							<li>
								<a href="#" class="card-refresh text-black" data-toggle="refresh">
									<i class="card-icon card-icon-refresh"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="p-l-20">
					<h3 class="no-margin p-b-5 text-white">{{App\Models\Company::count()}}</h3>
					<a href="#" class="btn-circle-arrow text-white">
						<i class="pg-arrow_minimize"></i>
					</a>
					<span class="small hint-text text-white">+1 Ce mois (text statique)</span>
				</div>
				<div class="mt-auto">
					<div class="progress progress-small m-b-20">
						<div class="progress-bar progress-bar-white" style="width:45%"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{--
	<div class="col-md-3 md-m-b-10 sm-m-b-10">
		<div class="widget-10 card no-border bg-warning no-margin widget-loader-bar">
			<div class="card-header  top-left top-right ">
				<div class="card-title text-black hint-text">
					<span class="font-montserrat fs-11 all-caps">
						Weekly Sales <i class="fa fa-chevron-right"></i>
					</span>
				</div>
				<div class="card-controls">
					<ul>
						<li>
							<a data-toggle="refresh" class="card-refresh text-black" href="#">
								<i class="card-icon card-icon-refresh"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="card-block p-t-40">
				<div class="row">
					<div class="col-sm-12">
						<h4 class="no-margin p-b-5 text-danger semi-bold">APPL 2.032</h4>
						<div class="pull-left small">
							<span>WMHC</span>
							<span class=" text-success font-montserrat">
								<i class="fa fa-caret-up m-l-10"></i> 9%
							</span>
						</div>
						<div class="pull-left m-l-20 small">
							<span>HCRS</span>
							<span class=" text-danger font-montserrat">
								<i class="fa fa-caret-up m-l-10"></i> 21%
							</span>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="p-t-10 full-width">
					<a href="#" class="btn-circle-arrow b-grey">
						<i class="pg-arrow_minimize text-danger"></i>
					</a>
					<span class="hint-text small">Show more</span>
				</div>
			</div>
		</div>
	</div>
	--}}
</div>

@endsection