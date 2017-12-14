 <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      <div class="sidebar-overlay-slide from-top" id="appMenu">
        
      </div>
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="{{asset('assets/img/logo_white.png')}}" alt="logo" class="brand" data-src="{{asset('assets/img/logo_white.png')}}" data-src-retina="{{asset('assets/img/logo_white_2x.png')}}" width="78" height="22">
        <div class="sidebar-header-controls">
          <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
          </button>
          <button type="button" class="btn btn-link hidden-sm-down" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30">
            <a href="{{route('admins.index')}}" class="detailed ">
              <span class="title">Accueil</span>
              <span class="details">
                {{ ($c = Auth::user()->notifications()->count()) == 1 ? "$c Notification": "$c Notifications" }}
              </span>
            </a>
            <span class="icon-thumbnail "><i class="fa fa-home"></i></span>
          </li>
          @if(Auth::user()->is('superadmin') or Auth::user()->is('admin'))
          <li class="">
            @if(Auth::user()->is('superadmin'))
            <a href="{{route('companies.index')}}" class="detailed">
            @elseif(Auth::user()->is('admin'))
            <a href="{{route('companies.show', Auth::user()->company)}}" class="detailed">
            @endif
              <span class="title">Entreprises</span>
              <span class="details">
                {{($c = \App\Models\Company::count())== 1 ? "$c  Entreprise" : "$c Entreprises"}}
            </span>
            </a>
            <span class="icon-thumbnail "><i class="fa fa-building"></i></span>
          </li>
          @endif
          <li class="">
            <a href="{{route('trainings.index')}}" class="detailed">
              <span class="title">Formations</span>
              <span class="details">
                @if(Auth::user()->isStudent())
                  {{Auth::user()->trainings()->count()}}
                @else
                  {{App\Models\Training::count()}} 
                @endif
                formations
              </span>
            </a>
            <span class="icon-thumbnail "><i class="fa fa-graduation-cap"></i></span>
          </li>
          @if(Auth::user()->isSuperAdmin())
          <li class="">
            <a href="{{route('courses.index')}}" class="detailed">
              <span class="title">cours</span>
              <span class="details">
                @if(Auth::user()->isStudent())
                  {{Auth::user()->courses()->count()}}
                @else
                  {{\App\Models\Course::count()}} 
                @endif
                Cours
              </span>
            </a>
            <span class="icon-thumbnail "><i class="fa fa-newspaper-o"></i></span>
          </li>

          <li class="">
            <a href="{{route('users.index')}}" class="detailed">
              <span class="title">Utilisateurs</span>
              <span class="details">{{\App\User::count()}} utilisateurs</span>
            </a>
            <span class="icon-thumbnail "><i class="fa fa-users"></i></span>
          </li>
          @endif
          <li class="">
            <a href="javascript:;">
              <span class="title">Page 3</span>
              <span class=" arrow"></span>
            </a>
            <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="#">Sub Page 1</a>
                <span class="icon-thumbnail">sp</span>
              </li>
              <li class="">
                <a href="#">Sub Page 2</a>
                <span class="icon-thumbnail">sp</span>
              </li>
              <li class="">
                <a href="#">Sub Page 3</a>
                <span class="icon-thumbnail">sp</span>
              </li>
            </ul>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>