<div class="header ">
  <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar"></a>
  <div class="">
    <div class="brand inline   ">
      <img src="{{asset('assets/img/logo.png')}}" alt="logo" data-src="{{asset('assets/img/logo.png')}}" data-src-retina="{{asset('assets/img/logo_2x.png')}}" width="78" height="22">
    </div>
    <ul class="hidden-md-down notification-list no-margin hidden-sm-down b-grey b-l b-r no-style p-l-30 p-r-20">
      <li class="p-r-10 inline">
        <div class="dropdown">
          <a href="javascript:;" id="notification-center" class="header-icon pg pg-world" data-toggle="dropdown">
            @if(Auth::user()->notifications()->count()>0)
            <span class="bubble"></span>
            @endif
          </a>
          <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
            <div class="notification-panel">
              <div class="notification-body scrollable">
                @foreach(Auth::user()->notifications as $notification)
                <div class="notification-item  clearfix">
                  <div class="heading">
                    <a href="{{$notification->href}}/notification/{{$notification->id}}" class="text-danger pull-left">
                      <i class="{{$notification->icon}}"></i>
                      <span>{{$notification->body}}</span>
                    </a>
                    <span class="pull-right time">2 mins ago</span>
                  </div>
                  <div class="option">
                    <a href="#" class="mark"></a>
                  </div>
                </div>
                @endforeach
                {{--
                <div class="notification-item  clearfix">
                  <div class="heading">
                    <a href="#" class="text-warning-dark pull-left">
                      <i class="fa fa-exclamation-triangle m-r-10"></i>
                      <span class="bold">Warning Notification</span>
                      <span class="fs-12 m-l-10">Buy Now</span>
                    </a>
                    <span class="pull-right time">yesterday</span>
                  </div>
                  <div class="option">
                    <a href="#" class="mark"></a>
                  </div>
                </div>
                <div class="notification-item unread clearfix">
                  <div class="heading">
                    <div class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
                      <img width="30" height="30" data-src-retina="{{asset('assets/img/profiles/1x.jpg')}}" data-src="{{asset('assets/img/profiles/1.jpg')}}" alt="" src="{{asset('assets/img/profiles/1.jpg')}}">
                    </div>
                    <a href="#" class="text-complete pull-left">
                      <span class="bold">Revox Design Labs</span>
                      <span class="fs-12 m-l-10">Owners</span>
                    </a>
                    <span class="pull-right time">11:00pm</span>
                  </div>
                  <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                    <a href="#" class="mark"></a>
                  </div>
                </div>
                --}}
              </div>
              <div class="notification-footer text-center">
                <a href="#" class="">Read all notifications</a>
                <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                  <i class="pg-refresh_new"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="p-r-10 inline">
        <a href="#" class="header-icon pg pg-link"></a>
      </li>
      <li class="p-r-10 inline">
        <a href="#" class="header-icon pg pg-thumbs"></a>
      </li>
    </ul>
    <a href="#" class="search-link hidden-md-down" data-toggle="search">
      <i class="pg-search"></i>
      Type anywhere to 
      <span class="bold">search</span>
    </a>
  </div>
  <div class="d-flex align-items-center">
    <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
      <span class="semi-bold">{{Auth::user()->name}}</span>
    </div>
    <div class="dropdown pull-right hidden-md-down">
      <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="thumbnail-wrapper d32 circular inline">
          <img src="{{asset('assets/img/profiles/avatar.jpg')}}" alt="" data-src="{{asset('assets/img/profiles/avatar.jpg')}}" data-src-retina="{{asset('assets/img/profiles/avatar_small2x.jpg')}}" width="32" height="32">
        </span>
      </button>
      <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
        <a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>
        <a href="#" class="dropdown-item"><i class="pg-outdent"></i> Feedback</a>
        <a href="#" class="dropdown-item"><i class="pg-signals"></i> Help</a>
        <a class="clearfix bg-master-lighter dropdown-item">
          <form action="{{route('logout')}}" method="POST">
            {{csrf_field()}}
            <button class="pull-left btn btn-block" style="background: #e7e7e7; border:none">
              Logout <i class="pg-power"></i>
            </button>
          </form>
        </a>
      </div>
    </div>
  </div>
</div>