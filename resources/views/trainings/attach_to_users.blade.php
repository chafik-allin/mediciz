@extends('layouts.admin.master',['title'=>"Créer une formation"])


@section('content')
<div class=" container-fluid   container-fixed-lg bg-white">
  <div class="card card-transparent">
    <div class="card-header ">
      <div class="alert alert-success" id="alert"></div>
      <div class="card-title">Attacher des utilisateurs à la formation {{ $training->title }}</div>
      <div class="pull-right mr-2">
          <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
        </div>
    </div>
    <div class="card-block">
      <div class="table-responsive">
        <div id="tableWithSearch_wrapper" class="dataTables_wrapper no-footer">
          <div>
            <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch" role="grid" aria-describedby="tableWithSearch_info">
              <thead>
                <tr>
                  <th style="width:1%" class="text-center">
                    <button class="btn btn-link"><i class="fa fa-users"></i></button>
                  </th>
                  <th style="width:20%">name</th>
                  <th style="width:20%">email</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  @continue( $user->isSuperAdmin() || $user->isAdmin() )
                <tr>
                  <td class="v-align-middle">
                    <div class="checkbox text-center">
                      <input type="checkbox" value="{{$user->id}}" id="checkbox{{$user->id}}" @if($user->hasTraining($training->id)) checked @endif >
                      <label for="checkbox{{$user->id}}" class="no-padding no-margin"></label>
                    </div>
                  </td>
                  <td class="v-align-middle ">
                    <p>{{$user->name}}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{$user->email}}</p>
                  </td>
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
@endsection

@section('scripts')
<script>
  $(document).ready()
  {
    $('#alert').hide()
    function hideAlert()
    {
      $('#alert').fadeOut()
    }
    $('input[type=checkbox]').change(function()
    {
        var action = "del"

        if($(this).is(':checked'))
          action = "add"
        
        var payload = {
                        _token: "{{csrf_token()}}",
                        training:'{{$training->id}}',
                        user: $(this).val(),
                        action: action
                      }
        $.post("{{route('trainings.storeusertraining')}}",payload,function(data)
        {
          $('#alert').show()

          if(data.success)
            $('#alert').removeClass('alert-warning').removeClass('alert-success').addClass('alert-success').text(data.success)
          else if(data.warning)
            $('#alert').removeClass('alert-warning').removeClass('alert-success').addClass('alert-warning').text(data.warning)
          
          setTimeout(hideAlert, 2000)
        })
    })
  }
</script>
@endsection