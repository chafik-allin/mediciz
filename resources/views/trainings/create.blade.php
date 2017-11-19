@extends('layouts.admin.master',['title'=>"Créer une formation"])


@section('styles')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.css')}}">
@endsection

@section('content')
<div class="card card-default mt-5">
  <div class="card-header ">
    <div class="card-title">
      Ajouter une formation
    </div>
  </div>
  <div class="card-block">
    @if(count($errors->all())>0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session('success'))
      <div class="alert alert-success">{{session('success')}}</div>
    @endif
  </div>
</div>

<div id="rootwizard" class="m-t-50">
  <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm hidden-sm-down" role="tablist" data-init-reponsive-tabs="dropdownfx">
    <li class="nav-item">
      <a class="active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true">
        <i class="fa fa-file-text-o tab-icon"></i>
        <span>Formation</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false">
        <i class="fa fa-file-image-o tab-icon"></i>
        <span>Cover</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="" data-toggle="tab" href="#tab3" role="tab" aria-expanded="false">
        <i class="fa pg-video tab-icon"></i>
        <span>Cours</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="" data-toggle="tab" href="#tab4" role="tab" aria-expanded="false">
        <i class="fa fa-check tab-icon"></i>
        <span>Validation</span>
      </a>
    </li>
  </ul>
  <div class="nav-tab-dropdown cs-wrapper full-width hidden-md-up">
    <div class="cs-select cs-skin-slide full-width" tabindex="0">
      <span class="cs-placeholder">Formation</span>
      <div class="cs-options">
        <ul>
          <li data-option="" data-value="#tab1">
            <span>Formation</span>
          </li>
          <li data-option="" data-value="#tab2">
            <span>Couver</span>
          </li>
          <li data-option="" data-value="#tab3">
            <span>Cours</span>
          </li>
          <li data-option="" data-value="#tab4">
            <span>Validation</span>
          </li>
        </ul>
      </div>
      <select class="cs-select cs-skin-slide full-width" data-init-plugin="cs-select">
        <option value="#tab1" selected="">Formation</option>
        <option value="#tab2">Couver</option>
        <option value="#tab3">Cours</option>
        <option value="#tab4">Validation</option>
      </select>
      <div class="cs-backdrop"></div>
    </div>
  </div>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane padding-20 sm-no-padding slide-left active" id="tab1" aria-expanded="true">
      <div class=" container-fluid   container-fixed-lg">
        <div class="card card-default">
          <div class="row row-same-height">
            <div class="col-lg-6">
              <div class="card-header ">
                <div class="card-title">
                  Cours
                </div>
              </div>
              <div class="card-block">
                <h5>Information sur le cours</h5>
                
                <div class="form-group">
                  <label>Name</label>
                  <span class="help">e.g. "Introduction génral"</span>
                  <input type="text" class="form-control" required="">
                </div>
               
                <div class="form-group">
                  <label>Type</label>
                  <input type="text" class="form-control">
                </div>

                <div class="form-group">
                  <label>Descriptions</label>
                  <textarea style="width: 100%; min-height: 100px; outline: none; resize: none;"></textarea>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card-header ">
                
              </div>
              <div class="card-block">
                <h5>Tags</h5>
                
                <div class="form-group">
                  <label>Tags</label>
                  <span class="help">e.g. "Into,Informatique"</span>
                  <input type="text" value="" data-role="tagsinput">
                </div>

                <div class="form-group ">
                  <label>Formation</label>
                  <select class="full-width select2-hidden-accessible" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                    </optgroup>
                      <optgroup label="Pacific Time Zone">
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                      <option value="OR">Oregon</option>
                      <option value="WA">Washington</option>
                    </optgroup>
                      <optgroup label="Mountain Time Zone">
                      <option value="AZ">Arizona</option>
                      <option value="CO">Colorado</option>
                      <option value="ID">Idaho</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NM">New Mexico</option>
                      <option value="ND">North Dakota</option>
                      <option value="UT">Utah</option>
                      <option value="WY">Wyoming</option>
                    </optgroup>
                    <optgroup label="Central Time Zone">
                      <option value="AL">Alabama</option>
                      <option value="AR">Arkansas</option>
                      <option value="IL">Illinois</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="OK">Oklahoma</option>
                      <option value="SD">South Dakota</option>
                      <option value="TX">Texas</option>
                      <option value="TN">Tennessee</option>
                      <option value="WI">Wisconsin</option>
                    </optgroup>
                    <optgroup label="Eastern Time Zone">
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="IN">Indiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NY">New York</option>
                      <option value="NC">North Carolina</option>
                      <option value="OH">Ohio</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SC">South Carolina</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WV">West Virginia</option>
                    </optgroup>
                  </select>
                  <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 1px;">
                    <span class="selection">
                      <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-jjzm-container">
                        <span class="select2-selection__rendered" id="select2-jjzm-container" title="Alaska">Alaska</span>
                        <span class="select2-selection__arrow" role="presentation">
                          <b role="presentation"></b>
                        </span>
                      </span>
                    </span>
                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                  </span>
                </div>
              
                <div class="form-group ">
                  <label>QCM</label>
                  <select class="full-width select2-hidden-accessible" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                    </optgroup>
                    <optgroup label="Pacific Time Zone">
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                      <option value="OR">Oregon</option>
                      <option value="WA">Washington</option>
                    </optgroup>
                    <optgroup label="Mountain Time Zone">
                      <option value="AZ">Arizona</option>
                      <option value="CO">Colorado</option>
                      <option value="ID">Idaho</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NM">New Mexico</option>
                      <option value="ND">North Dakota</option>
                      <option value="UT">Utah</option>
                      <option value="WY">Wyoming</option>
                    </optgroup>
                    <optgroup label="Central Time Zone">
                      <option value="AL">Alabama</option>
                      <option value="AR">Arkansas</option>
                      <option value="IL">Illinois</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="OK">Oklahoma</option>
                      <option value="SD">South Dakota</option>
                      <option value="TX">Texas</option>
                      <option value="TN">Tennessee</option>
                      <option value="WI">Wisconsin</option>
                    </optgroup>
                    <optgroup label="Eastern Time Zone">
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="IN">Indiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NY">New York</option>
                      <option value="NC">North Carolina</option>
                      <option value="OH">Ohio</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SC">South Carolina</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WV">West Virginia</option>
                    </optgroup>
                  </select>
                  <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 1px;">
                    <span class="selection">
                      <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-3q13-container">
                        <span class="select2-selection__rendered" id="select2-3q13-container" title="Alaska">Alaska</span>
                        <span class="select2-selection__arrow" role="presentation">
                          <b role="presentation"></b>
                        </span>
                      </span>
                    </span>
                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                  </span>
                </div>

                <div class="form-group ">
                  <label>Certif</label>
                  <select class="full-width select2-hidden-accessible" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                    </optgroup>
                    <optgroup label="Pacific Time Zone">
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                      <option value="OR">Oregon</option>
                      <option value="WA">Washington</option>
                    </optgroup>
                    <optgroup label="Mountain Time Zone">
                      <option value="AZ">Arizona</option>
                      <option value="CO">Colorado</option>
                      <option value="ID">Idaho</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NM">New Mexico</option>
                      <option value="ND">North Dakota</option>
                      <option value="UT">Utah</option>
                      <option value="WY">Wyoming</option>
                    </optgroup>
                    <optgroup label="Central Time Zone">
                      <option value="AL">Alabama</option>
                      <option value="AR">Arkansas</option>
                      <option value="IL">Illinois</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="OK">Oklahoma</option>
                      <option value="SD">South Dakota</option>
                      <option value="TX">Texas</option>
                      <option value="TN">Tennessee</option>
                      <option value="WI">Wisconsin</option>
                    </optgroup>
                    <optgroup label="Eastern Time Zone">
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="IN">Indiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NY">New York</option>
                      <option value="NC">North Carolina</option>
                      <option value="OH">Ohio</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SC">South Carolina</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WV">West Virginia</option>
                    </optgroup>
                  </select>
                  <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 1px;">
                    <span class="selection">
                      <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-9pvi-container">
                        <span class="select2-selection__rendered" id="select2-9pvi-container" title="Alaska">Alaska</span>
                        <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                      </span>
                    </span>
                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
        <ul class="pager wizard no-style">
          <li class="next" style="">
            <a data-toggle="tab" href="#tab2" role="tab" class="btn btn-primary btn-cons pull-right"> 
              Suivant
            </a>
          </li>
          <li class="previous disabled">
            <button class="btn btn-default btn-cons pull-right" type="button">
              <span>Précédent</span>
            </button>
          </li>
        </ul>
      </div>
    </div>

    <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab2" aria-expanded="false">
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
            <i class="fa fa-picture-o"></i> Choisir
          </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="image" value="{{old('image')}}" required >
      </div>
      <img id="holder" style="margin-top:15px;max-height:100px;" src="{{old('image')}}" > 
      <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
        <ul class="pager wizard no-style">
          <li class="next" style="">
            <a data-toggle="tab" href="#tab3" role="tab" aria-expanded="false" class="btn btn-primary btn-cons pull-right"> 
              Suivant
            </a>
          </li>
          <li class="previous disabled">
            <a data-toggle="tab" href="#tab1" role="tab" aria-expanded="false" class="btn btn-secondary btn-cons pull-right"> 
              Précédent
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab3" aria-expanded="false">
      <div class="card card-transparent">
        <div class="row row-same-height">
          <div class="col-lg-12">
            <div class="card-header ">
              <div class="card-title">Cours</div>
              <div class="pull-right">
                <div class="col-xs-12">
                  <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="card-block">
              <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Places</th>
                    <th>Activities</th>
                    <th>Status</th>
                    <th>Last Update</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="v-align-middle">
                      <div class="checkbox text-center">
                        <input type="checkbox" value="3" id="checkbox4">
                        <label for="checkbox4" class="no-padding no-margin"></label>
                      </div>
                    </td>
                    <td class="v-align-middle semi-bold">
                      <p>First Tour</p>
                    </td>
                    <td class="v-align-middle">
                      <a href="#" class="btn btn-tag">United States</a>
                      <a href="#" class="btn btn-tag">India</a>
                      <a href="#" class="btn btn-tag">China</a>
                      <a href="#" class="btn btn-tag">Africa</a>
                    </td>
                    <td class="v-align-middle">
                      <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                    </td>
                    <td class="v-align-middle">
                      <p>Public</p>
                    </td>
                    <td class="v-align-middle">
                      <p>April 13,2014 10:13</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="v-align-middle">
                      <div class="checkbox text-center">
                        <input type="checkbox" value="3" id="checkbox3">
                        <label for="checkbox4" class="no-padding no-margin"></label>
                      </div>
                    </td>
                    <td class="v-align-middle semi-bold">
                      <p>First Tour</p>
                    </td>
                    <td class="v-align-middle">
                      <a href="#" class="btn btn-tag">United States</a>
                      <a href="#" class="btn btn-tag">India</a>
                      <a href="#" class="btn btn-tag">China</a>
                      <a href="#" class="btn btn-tag">Africa</a>
                    </td>
                    <td class="v-align-middle">
                      <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                    </td>
                    <td class="v-align-middle">
                      <p>Public</p>
                    </td>
                    <td class="v-align-middle">
                      <p>April 13,2014 10:13</p>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
        <ul class="pager wizard no-style">
          <li class="next" style="">
              <a class="btn btn-cons btn-primary" data-toggle="tab" href="#tab4" role="tab" aria-expanded="false">
              <span>Suivant</span>
            </a>
          </li>
          <li class="next finish" style="display: none;">
            <button class="btn btn-primary btn-cons pull-right" type="button">
              <span>Fin</span>
            </button>
          </li>
        </ul>
      </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab4" aria-expanded="false">
      <h1>Merci.</h1>
      <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
        <ul class="pager wizard no-style">
          <li class="next" style="">
            <button class="btn btn-primary btn-cons pull-right" type="button">
              <span>Suivant</span>
            </button>
          </li>
          <li class="next finish" style="display: none;">
            <button class="btn btn-primary btn-cons pull-right" type="button">
              <span>Fin</span>
            </button>
          </li>
          <li class="previous first hidden disabled">
            <button class="btn btn-default btn-cons pull-right" type="button">
              <span>Premier</span>
            </button>
          </li>
          <li class="previous disabled">
            <button class="btn btn-default btn-cons pull-right" type="button">
              <span>Précédent</span>
            </button>
          </li>
        </ul>
      </div>
    </div>
    <!-- Tab button -->
  </div>
</div>


@endsection

@section('scripts')
<script>
  $('#lfm').filemanager('image');
</script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js')}}"></script>    
@endsection
