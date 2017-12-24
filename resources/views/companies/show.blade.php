@extends('layouts.admin.master')

@section('styles')
  <style>
    #company-cover
    {
      background: url({{asset($company->image)}});
      background-size:cover;
      background-position: center center;
    }
  </style>
@endsection

@section('content')

<div class="social-wrapper">
  <div class="social " data-pages="social">
    <div class="jumbotron" data-pages="parallax" data-social="cover">
      <div class="cover-photo" id="company-cover"></div>
      <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner" style="transform: translateY(0px); opacity: 1;">
          <div class="pull-bottom bottom-left m-b-40">
            <h1 class="text-white m-l-20">
              <span class="semi-bold">{{$company->name}}</span>
            </h1>
          </div>
        </div>    
      </div>
    </div>
    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
      <div class="feed">
        <div class="day" data-social="day">
          <div class="card no-border bg-transparent full-width" data-social="item">
            <div class="container-fluid p-t-30 p-b-30 ">
              <div class="row">
                <div class="col-md-4">
                  <div class="container-xs-height">
                    <div class="row-xs-height">
                      <div class="social-user-profile col-xs-height text-center col-top">
                        <div class="thumbnail-wrapper d48 circular bordered b-white">
                          @if($company->admin)

                          @else
                          <img alt="Avatar" width="55" height="55" data-src-retina="https://pbs.twimg.com/profile_images/757974066011770880/ae2Eop2g.jpg" data-src="https://pbs.twimg.com/profile_images/757974066011770880/ae2Eop2g.jpg" src="https://pbs.twimg.com/profile_images/757974066011770880/ae2Eop2g.jpg">
                          @endif
                        </div>
                        <br>
                        <i class="fa fa-check-circle text-success fs-16 m-t-10"></i>
                      </div>
                      <div class="col-xs-height p-l-20">
                        <h3 class="no-margin">@if($company->admin) {{$company->admin->name}} @else <div class="label label-danger">Admin Indéfinie</div> @endif</h3>  
                        <p class="no-margin fs-16">{{$company->contact}}</p>
                        <p class="hint-text m-t-5 small">{{$company->phone}}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <p class="no-margin fs-16">Description de l'entreprise :</p>
                  <p class="hint-text m-t-5 bold">
                    {{$company->description}}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-transparent ">
            <ul class="nav nav-tabs nav-tabs-fillup hidden-sm-down" data-init-reponsive-tabs="dropdownfx">
              <li class="nav-item">
                <a href="#" class="active" data-toggle="tab" data-target="#tab-fillup1" aria-expanded="true">
                  <span>Formations associées à cette entreprise</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" data-toggle="tab" data-target="#tab-fillup2" class="" aria-expanded="false">
                  <span>Les employés de cette entreprise</span>
                </a>
              </li>
            </ul>
            <div class="nav-tab-dropdown cs-wrapper full-width hidden-md-up">
              <div class="cs-select cs-skin-slide full-width" tabindex="0">
                <span class="cs-placeholder">Formations associées à cette entreprise</span>
                <div class="cs-options">
                  <ul>
                    <li data-option="" data-value="#tab-fillup1">
                      <span>Formations associées à cette entreprise</span>
                    </li>
                    <li data-option="" data-value="#tab-fillup2">
                      <span>Les employés de cette entreprise</span>
                    </li>
                  </ul>
                </div>
                <select class="cs-select cs-skin-slide full-width" data-init-plugin="cs-select">
                  <option value="#tab-fillup1" selected="">Formations associées à cette entreprise</option>
                  <option value="#tab-fillup2">employés de cette entreprise</option>
                </select>
                <div class="cs-backdrop"></div>
              </div>
            </div>
            <div class="tab-content">
              <div class="tab-pane active" id="tab-fillup1" aria-expanded="true">
            
                <div class="card-block">
                    <div class="col-12"  >
                      <a href="{{route('trainings.index')}}" class="btn btn-primary">Voir toutes les formations</a>
                  </div>
                  <hr style="width: 50px;">
                  <div class="row">

                    @forelse($company->getAllTrainings as $training)
                      <div class="col-md-4"> 
                        @component('components.training', ['training'=>$training]) @endcomponent
                      </div>
  
                    @empty
                    <div class="col-md-12">
                      <div class="alert alert-warning text-center">
                        Aucune formation n'est associé à cette entreprise
                      </div>
                    </div>
                    @endforelse
                  {{--
                    <div class="col-lg-4  mix Programmation">
                      <div class="card card-default ">
                        <div class="card-header  separator">
                          <div class="card-controls" data-target="#modalSlideLeft" data-toggle="modal">
                            <ul>
                              <li>
                                <a data-toggle="close" class="card-close" href="#">
                                  <i class="card-icon card-icon-close"></i>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="card-title bold text-primary"> 10
                            <i class="fa fa-user"></i>
                          </div>
                          <div class="card-title bold">.</div>
                          <div class="card-title bold text-success"> 04
                            <i class="fa fa-check"></i> 
                          </div>
                          <div class="card-title bold "> .</div>
                          <div class="card-title bold text-danger"> 04
                            <i class="fa fa-close"></i> 
                          </div>
                        </div>
                        <a href="/admin_formation">
                          <div class="cover-photo">
                            <img class="image-responsive-height " src="{{asset('assets/img/formation/1.jpeg')}}" alt="">
                          </div>
                        </a>
                        <div class="card-block">
                          <h3><span class="semi-bold">Visite</span> de risque</h3>
                          <h5 class="semi-bold">Mahdi Nabil, Ali Benabbes</h5>
                          <div class="card-title bold text-primary">
                            <i class="fa  fa-clock-o"></i> 48 Hours
                          </div>
                          <p>
                            La visite de risques est introduite dans l’établissement comme méthode de repérage et d’évaluation de risques latents, découvrez cette formation indispensable dans le cours suivant.
                          </p>
                          <br>
                          <button class="btn btn-tag   btn-tag-light btn-tag-rounded m-r-5 m-b-10">ECommerce</button>
                          <button class="btn btn-tag   btn-tag-light btn-tag-rounded m-r-5 m-b-10">Marketing</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 mix Programmation">
                      <div class="card card-default ">
                        <div class="card-header  separator">
                          <div class="card-title bold text-primary"> 10
                            <i class="fa fa-user"></i>
                          </div>
                          <div class="card-title bold"> .</div>
                          <div class="card-title bold text-success"> 04
                            <i class="fa fa-check"></i> 
                          </div>
                          <div class="card-title bold "> .</div>
                          <div class="card-title bold text-danger"> 04
                            <i class="fa fa-close"></i> 
                          </div>
                        </div>
                        <div class="cover-photo">
                          <img class="image-responsive-height " src="{{asset('assets/img/formation/2.jpg')}}" alt="">
                        </div>
                        <div class="card-block">
                          <h3><span class="semi-bold">Swift 04</span> Developers secret</h3>
                          <h5 class="semi-bold">Ali Benabbes</h5>
                          <div class="card-title bold text-primary">
                            <i class="fa  fa-clock-o"></i> 48 Hours
                          </div>
                          <p>
                            La visite de risques est introduite dans l’établissement comme méthode de repérage et d’évaluation de risques latents, découvrez cette formation indispensable dans le cours suivant.
                          </p>
                          <br>
                          <button class="btn btn-tag   btn-tag-light btn-tag-rounded m-r-5 m-b-10">
                            Programation
                          </button>
                          <button class="btn btn-tag   btn-tag-light btn-tag-rounded m-r-5 m-b-10">Design</button>
                          <button class="btn btn-tag   btn-tag-light btn-tag-rounded m-r-5 m-b-10">UI/UX</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 mix Marketing">
                      <div class="card card-default ">
                        <div class="card-header  separator">
                          <div class="card-title bold text-primary"> 10
                            <i class="fa fa-user"></i>
                          </div>
                          <div class="card-title bold"> .</div>
                          <div class="card-title bold text-success"> 04
                            <i class="fa fa-check"></i> 
                          </div>
                          <div class="card-title bold "> .</div>
                          <div class="card-title bold text-danger"> 04
                            <i class="fa fa-close"></i> 
                          </div>
                        </div>
                        <div class="cover-photo">
                          <img class="image-responsive-height " src="{{asset('assets/img/formation/3.jpeg')}}" alt="">
                        </div>
                        <div class="card-block">
                          <h3><span class="semi-bold">Android</span> From zero to hero</h3>
                          <h5 class="semi-bold">Mahdi Nabil</h5>
                          <div class="card-title bold text-primary">
                            <i class="fa  fa-clock-o"></i> 50 Hours
                          </div>
                          <p>
                            La visite de risques est introduite dans l’établissement comme méthode de repérage et d’évaluation de risques latents, découvrez cette formation indispensable dans le cours suivant.
                          </p>
                          <br>
                          <button class="btn btn-tag   btn-tag-light btn-tag-rounded m-r-5 m-b-10">Commerce</button>
                          <button class="btn btn-tag   btn-tag-light btn-tag-rounded m-r-5 m-b-10">Marketing</button>
                        </div>
                      </div>
                    </div>
                  --}}
                  </div>
                </div>
                <div class="modal fade slide-right" id="modalSlideLeft" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content-wrapper">
                      <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="pg-close fs-14"></i>
                        </button>
                        <div class="container-xs-height full-height">
                          <div class="row-xs-height">
                            <div class="modal-body col-xs-height col-middle text-center   ">
                              <h5 class="text-danger ">
                                Etes vous sur !<span class="semi-bold"> pour procceder</span> la supprission de la formation pour ce client
                              </h5>
                              <br>
                              <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">
                                Continue
                              </button>
                              <button type="button" class="btn btn-default btn-block" data-dismiss="modal">
                                Cancel
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-fillup2" aria-expanded="false">
                <div class=" container-fluid   container-fixed-lg bg-white">
                  <div class="card card-transparent">
                    <div class="card-header ">
                      <div class="card-title"> <h3>{{$count = $company->users()->count()}} employés</h3></div>
                      @if($count>0)
                      <div class="pull-right">
                        <div class="col-xs-12">
                          <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                      </div>
                      @endif
                      <div class="clearfix"></div>
                    </div>
                    @if($count>0)
                    <div class="card-block">
                      <div id="tableWithSearch_wrapper" class="dataTables_wrapper no-footer">
                        <div>
                          <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch" role="grid" aria-describedby="tableWithSearch_info">
                            <thead>
                              <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom d'utilisateur: activate to sort column descending">
                                    Nom d'utilisateur
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Formations : activate to sort column ascending" style="width: 22px;">
                                      Formations 
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Heurs: activate to sort column ascending" style="width: 24px;">
                                        Heurs
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Certifications: activate to sort column ascending" style="width: 15px;">
                                    Certifications
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="derniere conx: activate to sort column ascending" style="width: 19px;">
                                    derniere conx
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($company->users as $user)
                              <tr role="row" class="odd">
                                <td class="v-align-middle semi-bold sorting_1">
                                  <a href="{{route('users.show', $user)}}" class="btn btn-primary ">
                                    <h4 class="text-white">{{$user->name}}</h4>
                                  </a>
                                </td>
                                <td class="v-align-middle">
                                  <h3 href="#">{{$user->trainings()->count()}}</h3>
                                </td>
                                <td class="v-align-middle">
                                  <h3 href="#"><div class="label label-danger">à faire</div></h3>
                                </td>
                                <td class="v-align-middle">
                                  <h3><div class="label label-danger">A faire</div></h3>
                                </td>
                                <td class="v-align-middle">
                                  <p>April 13,2014 10:13</p>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    @endif
                  </div>
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
