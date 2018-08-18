<!-- Top Navigation Bar -->

<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation"
     xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided" data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>

        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>

        <div class=" navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">


            <img class="navbar-brand-logo img-circle" src="{{Auth::user()->profile->getPicture()}}"  title="Profile Picture" style="float:right;margin-right:20px">


            <div style="
    height: 50px;
">
                <div style="float:right;height: 60px;">

                    <p style="
    height: 10px;
    margin-bottom: 15px;

    margin-top: -15px;
">
                        <strong id="username">{{Auth::user()->profile->getFullName()}}</strong>

                    </p>
                    <p style="
    height: 30px;

    margin-top: 0px;

    margin-bottom: 0px;
">
                        <span style="float:right;height: 30px;font-size:small">قائد الفوج</span>

                    </p>
                    <div style="text-align:right;height: 0px;font-size:small">
                        {{Auth::user()->profile->getRegistrationNumber()}}

                    </div>


                </div>


            </div>





        </div>

        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search" data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon wb-search" aria-hidden="true"></i>
        </button>
    </div>

    <div class="navbar-container container-fluid" >
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="hidden-xs" id="toggleMenubar" style="height: 80px">
                    <a data-toggle="menubar" href="#" role="button"  style="height: 66px">
                        <i class="icon hamburger hamburger-arrow-left" id="arrow" style="height: 20px;">
                            <span class="hamburger-bar"></span>
                            <span class="sr-only">Toggle menubar</span>

                        </i>
                    </a>
                </li>
                <li class="hidden-xs" id="toggleFullscreen">
                    <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
                <li class="hidden-float">
                    <a class="icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search" role="button">
                        <span class="sr-only">Toggle Search</span>
                    </a>
                </li>
            </ul> <!-- End Navbar Toolbar -->

            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right" style="height: 80px">
                <li class="dropdown">
                    <a class="dropdown-toggle" title="{{ trans('app.languages')}}"
                       data-toggle="dropdown" href="javascript:void(0)"
                       data-animation="scale-up"aria-expanded="false"
                       role="button">

                        @if(Session::get('locale_image'))
                            <img width="18.66" height="14"
                                 src="{{URL::to('/')}}/assets/flags/@if(Session::get('locale_image')){{Session::get('locale_image')}} @endif"/>
                        @else
                            <img width="22.66" height="16" src="{{URL::to('/')}}/assets/flags/america.png"/>
                        @endif
                    </a>
                    <ul class="dropdown-menu" role="menu">

                        @foreach($language as $viewdata)
                            <li role="presentation">


                                <a href="{{URL::to('/LanguageController/chooser_language/')}}/{{$viewdata->foldername}}"
                                   role="menuitem">

                                    @if(!empty($viewdata->flag_image))
                                        <img src="{{URL::to('assets/flags')}}/{{$viewdata->flag_image}}"
                                             width="18.66" height="14" />
                                    @endif
                                    {{$viewdata->languagename}}

                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown"
                       href="#" aria-expanded="false"
                       title="{{ trans('app.my_profile')}}" data-animation="scale-up"
                       role="button">

                          <span class="avatar avatar-online">
                              <!--  <img src="{{URL::to('/')}}/global/portraits/5.jpg" alt="...">-->
                                  <!-- insert user image instead -->
                                  <img src="{{URL::to('/')}}/images/default.png" alt="...">
                              </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a>
                                <router-link class="animsition-link" to="/Profile"/>
                                <span class="site-menu-title" style="color:black">{{ trans('app.form')}}</span>
                            </a>
                        </li>

                        @if (Auth::user()->hasRole('gov'))
                            <li role="presentation">
                                <a href="{{URL::to('settings')}}" role="menuitem">
                                    <i class="icon wb-settings" aria-hidden="true"></i>
                                    {{ trans('app.settings')}}
                                </a>
                            </li>
                        @endif

                        <li class="divider" role="presentation"></li>
                        <li role="presentation">
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ trans('app.logout') }}
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

               
                @if (Auth::user()->hasRole('gov'))
                    <li >
                        <a onclick="Navigate()">
                        <i class="icon wb-more-vertical" aria-hidden="true"></i>
                        </a>

                    </li>
                @endif
            </ul><!-- End Navbar Toolbar Right -->
            <div  id="mySidenav" class="slidePanel slidePanel-right site-sidebar slidePanel-show" style="transform: translate3d(0%, 0px, 0px);width: 0px">
                <div id="chatvue" style="height:100%;">


                <div class=" row control-sidebar-tabs"  >
                    <div id="chat" class="col-sm-6 center chat-element" onclick="OpenChatRoom()"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-comments"></i> </a>

                    </div>
                    <div id="friend" class="col-sm-6 center friend-element" onclick="OpenFriendList()"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-user"></i>
                            <span class="badge" style="color: white !important;margin-top: 20px;background-color: #62a8ea">@{{usersinroom.length}}</span>
                        </a></div>


                </div>


                <div class="sidebar-body">
                    <div id="chat-room" class="chat-room" style="height: 100%">

                            <div class="card  card-default" style="background-color:#222d32 ;margin-bottom: 0;margin-top: 0;height:80%" >

                                <div  class="card-body" style="padding: 0px;height:100%">
                                    <div id="chatbody" style="overflow-y:auto;overflow-x:hidden;height:100%">
                                        <chat-log :messages="messages"></chat-log>

                                    </div>




                                </div>

                            </div>

                        <chat-composer  v-on:messagesent="addMessage" style="height: 10%"></chat-composer>

                        </div>
                    <div id="friend-list" class="friend-list">
                        <div class="card" style="height:500px;margin-top: 0px;margin-bottom: 0px;background-color: #222d32;overflow-y: auto;overflow-x: hidden">

                            <friend-list :allusers="allusers" :usersinroom="usersinroom" ></friend-list>


                        </div>

                    </div>

                </div>
                </div>
            </div>



        </div>
        <!-- End Navbar Collapse -->

        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search" action="{{URL::to('userlist')}}">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="search" placeholder="{{ trans('app.search_for_users')}}">
                        <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div><!-- End Site Navbar Seach -->
    </div>
</nav> <!-- End of Top Navigation Bar -->
<script>

    function Navigate() {
        if(document.getElementById("mySidenav").style.width==="0px")
        document.getElementById("mySidenav").style.width = "350px";
        else
            document.getElementById("mySidenav").style.width = "0";
    }


    function OpenChatRoom() {
        document.getElementById("chat").style.background ="#222d32";
        document.getElementById("friend").style.background ="#263238";

       document.getElementById("friend-list").style.display ="none";
       document.getElementById("chat-room").style.display ="inline";

    }
    function OpenFriendList() {
        document.getElementById("chat").style.background ="#263238";
        document.getElementById("friend").style.background ="#222d32";

        document.getElementById("friend-list").style.display ="inline";
        document.getElementById("chat-room").style.display ="none";
    }

</script>