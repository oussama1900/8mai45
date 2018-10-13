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


            <img class="navbar-brand-logo  img-circle" src="{{Auth::user()->profile->getPicture()}}"   style="float:right;margin-right:20px">


            <div class="navbar-brand-text hidden-xs" style="height: 50px;">
                <div style="float:right;height: 60px;">

                    <p style="
    height: 10px;
    margin-bottom: 15px;

    margin-top: -15px;
">
                        <strong id="username" style="float:right;height: 20px;">{{Auth::user()->profile->getFullName()}}</strong>

                    </p>
                    <p style="
    height: 30px;

    margin-top: 0px;

    margin-bottom: 0px;
">
                        <span id="captain_role" style="float:right;height: 30px;font-size:12px">{{Auth::user()->captain->assignedRole->getRole()}}  <small>{{Auth::user()->captain->assignedRole->getUnit()}}</small></span>

                    </p>
                    <div id="captain_reg_number" style="text-align:right;height: 0px;font-size:small">
                        {{Auth::user()->profile->getRegistrationNumber()}}

                    </div>


                </div>


            </div>





        </div>

      <!--  <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search" data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon wb-search" aria-hidden="true"></i>
        </button>-->
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
               <!-- <li class="hidden-float">
                    <a class="icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search" role="button">
                        <span class="sr-only">Toggle Search</span>
                    </a>
                </li>-->
            </ul> <!-- End Navbar Toolbar -->

            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right" style="height: 80px">
                <li id="notification" style="background-color:white">
                  <Notification id="notification" :unreads="{{auth()->user()->unreadnotifications}}" :userid="{{auth()->user()->scout_id}}" :notification="{{auth()->user()->notifications}}"></Notification>



                  <li>



              
                    <li >
                        <a onclick="Navigate()">
                        <i id="chatro" class="icon fa fa-comment-o"  aria-hidden="true"></i>
                        </a>

                    </li>

            </ul><!-- End Navbar Toolbar Right -->
            <div  id="mySidenav" class="slidePanel slidePanel-right site-sidebar slidePanel-show" style="transform: translate3d(0%, 0px, 0px);width: 0px">
                <div id="chatvue" style="height:100%;">


                <div class=" row control-sidebar-tabs"  >
                    <div id="chat" class="col-sm-6 col-xs-6 center chat-element" onclick="OpenChatRoom()"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-comments"></i> </a>


                    </div>
                    <div id="friend" class="col-sm-6 col-xs-6 center friend-element" onclick="OpenFriendList()"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-user"></i>
                            <span class="badge" style="color: white !important;margin-top: 20px;background-color: #62a8ea">@{{usersinroom.length-1}}</span>
                        </a></div>


                </div>


                <div class="sidebar-body">
                    <div id="chat-room" class="chat-room" style="height: 100%">

                            <div class="card  card-default" style="background-color:#222d32 ;margin-bottom: 0;margin-top: 0;height:100%;margin-left:0px" >

                                <div  class="card-body" style="padding: 0px;height:100%">
                                    <div id="chatbody"   style="height:90%;width:100%">
                                        <chat-log :messages="messages"></chat-log>

                                    </div>



                                </div>

                            </div>

                        <chat-composer  v-on:messagesent="addMessage" style="position:absolute;bottom:0px;width: 100%;"></chat-composer>

                        </div>
                    <div id="friend-list" class="friend-list">
                        <div class="card" id="list-friend" style="height:90%;margin-top: 0px;margin-bottom: 0px;background-color: #222d32;overflow-y: auto;overflow-x: hidden;margin-left:0px;padding-left:5px">

                            <friend-list :allusers="allusers" :usersinroom="usersinroom" ></friend-list>


                        </div>

                    </div>

                </div>
                </div>
            </div>



        </div>
        <!-- End Navbar Collapse -->

        <!-- Site Navbar Seach -->
      <!--  <div class="collapse navbar-search-overlap" id="site-navbar-search">
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
        </div>--><!-- End Site Navbar Seach -->
    </div>
</nav> <!-- End of Top Navigation Bar -->
<script>
$(document).ready(function() {
    $(".dropdown-toggle").dropdown();

});
    function Navigate() {
        if(document.getElementById("mySidenav").style.width==="0px"){
          document.getElementById('chatro').style.color="green";
          document.getElementById("mySidenav").style.width = "350px";
        }else{
            document.getElementById('chatro').style.color="grey";
            document.getElementById("mySidenav").style.width = "0";
        }



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

</script>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
<style>
#notification:hover{
  background-color: white
}
    @media(max-width: 981px){
        #notification{

        }
    }
#list-friend{




    overflow-y: scroll;


}
#list-friend::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
}


#list-friend::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

#list-friend::-webkit-scrollbar-thumb
{
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
    #username{
        font-size:20px;
    }
    #captain_role{
        font-size:18px !important;
    }
    #captain_reg_number{
        font-size:16px !important;

    }
</style>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
