<!-- Sidebar -->
<div class="site-menubar">
        <div class="site-menubar-body">
          <div>
            <div>
              <ul class="site-menu">
                <br/>
                <!--the home sidebar item-->
                <li class="site-menu-item has-sub ">
                  <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                    <span class="site-menu-title">
                      {{ trans('app.dashboard')}}
                    </span>
                    <span class="site-menu-arrow"/>
                  </a>			  
                  <ul class="site-menu-sub">
                    <li class="site-menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
                        <router-link class="animsition-link" to="/hub"/>
                        <span class="site-menu-title">{{ trans('app.home')}}</span>
                      </a>
                    </li>
                  </ul>
                       </li>

                  <!--the forms sidebar item-->
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.add file')}}</span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">
                          <li class="site-menu-item {{ Request::is('#') ? 'active' : '' }}">
                              <a class="animsition-link" href="{{URL::to('/#')}}">
                                  <span class="site-menu-title">{{ trans('app.form')}}</span>
                              </a>
                          </li>
                          <li class="site-menu-item {{ Request::is('#') ? 'active' : '' }}">
                              <a class="animsition-link" href="{{URL::to('/#')}}">
                                  <span class="site-menu-title">{{ trans('app.repport')}}</span>
                              </a>
                          </li>
                      </ul>
                  </li>
  
                   <!-- Users menu -->	
                 @permission(['users.manage', 'users.activity'])	         
                         <li class="site-menu-item has-sub">
                    <a href="javascript:void(0)">
                             <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                       <span class="site-menu-title">{{ trans('app.users')}}</span>
                       <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                      @permission('users.manage') 
                        <li class="site-menu-item {{ Request::is('registration') ? 'active' : '' }}">
                        <router-link class="animsition-link" to="/dashboard/scouts/accounts/register"/>
                        <span class="site-menu-title">{{ trans('app.add_user')}}</span>
                        </a>
                      </li>
                      <li class="site-menu-item {{ Request::is('userlist') ? 'active' : '' }}">
                        <a class="animsition-link " href="{{URL::to('userlist')}}">
                        <span class="site-menu-title">{{ trans('app.users')}}</span>
                        </a>
                      </li>
                              @endpermission
                              @permission('users.activity') 
                      <li class="site-menu-item {{ Request::is('activity') ? 'active' : '' }}">
                        <a class="animsition-link" href="{{URL::to('activity')}}">
                          <span class="site-menu-title">{{ trans('app.activity_log')}}</span>
                        </a>
                      </li>  
                              @endpermission
                    </ul>			  
                   </li>
                  @endpermission
  
              <!-- posts menu -->
              @permission(['posts.write', 'posts.approve'])
                <li class="site-menu-item has-sub {{ Request::is('writePosts','approvePosts','viewPosts') ? 'active' : '' }}">
                  <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-quote-right" aria-hidden="true"></i>
                    <span class="site-menu-title">{{trans('app.Publish')}}</span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                  @permission('posts.write')
                    <li class="site-menu-item {{ Request::is('writePosts') ? 'active' : '' }}">
                      <a class="animsition-link" href="{{URL::to('/dashboard/posts')}}">
                        <span class="site-menu-title">{{trans('app.post')}}</span>ss
                      </a>
                    </li>
                  @endpermission
                  @permission('posts.approve')
                    <li class="site-menu-item {{ Request::is('approvePosts') ? 'active' : '' }}">
                      <a class="animsition-link " href="{{URL::to('/approvePosts')}}">
                        <span class="site-menu-title">{{trans('app.event')}}</span>
                      </a>
                    </li>
                  @endpermission

  
                </ul>
              </li>
              @endpermission
                  <!--the Miscellaneous sidebar item-->
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.Miscellaneous')}}</span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">  <!--my posts sidebar item-->
                          <li class="site-menu-item {{ Request::is('#') ? 'active' : '' }}">
                              <a class="animsition-link" href="{{URL::to('/#')}}">
                                  <span class="site-menu-title">{{ trans('app.my posts')}}</span>
                              </a>
                          </li>
                      </ul>
                      <ul class="site-menu-sub">  <!--forum sidebar item-->
                          <li class="site-menu-item {{ Request::is('#') ? 'active' : '' }}">
                              <a class="animsition-link" href="{{URL::to('/#')}}">
                                  <span class="site-menu-title">{{ trans('app.forum')}}</span>
                              </a>
                          </li>
                      </ul>
                      <ul class="site-menu-sub">  <!--recived repoorts sidebar item-->
                          <li class="site-menu-item {{ Request::is('#') ? 'active' : '' }}">
                              <a class="animsition-link" href="{{URL::to('/#')}}">
                                  <span class="site-menu-title">{{ trans('app.Received repports')}}</span>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!--the finance sidebar item-->
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-table" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.Finance')}}</span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">  <!--my posts sidebar item-->
                          <li class="site-menu-item {{ Request::is('#') ? 'active' : '' }}">
                              <a class="animsition-link" href="{{URL::to('/#')}}">
                                  <span class="site-menu-title">{{ trans('app.Financial report')}}</span>
                              </a>
                          </li>
                      </ul>
                      <ul class="site-menu-sub">  <!--forum sidebar item-->
                          <li class="site-menu-item {{ Request::is('#') ? 'active' : '' }}">
                              <a class="animsition-link" href="{{URL::to('/#')}}">
                                  <span class="site-menu-title">{{ trans('app.money mangment')}}</span>
                              </a>
                          </li>
                      </ul>
                      <ul class="site-menu-sub">  <!--forum sidebar item-->
                          <li class="site-menu-item {{ Request::is('#') ? 'active' : '' }}">
                              <a class="animsition-link" href="{{URL::to('/#')}}">
                                  <span class="site-menu-title">{{ trans('app.Equipment')}}</span>
                              </a>
                          </li>
                      </ul>
                  </li>
             <!-- my scout menu -->
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-table" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.my scout')}}</span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">  <!--my posts sidebar item-->
                          <li class="site-menu-item {{ Request::is('#') ? 'active' : '' }}">
                              <a class="animsition-link" href="{{URL::to('/#')}}">
                                  <span class="site-menu-title">{{ trans('app.captins')}}</span>
                              </a>
                          </li>
                      </ul>
                  </li>

                    </li>
                  </ul><!-- Message  menu -->
                         @permission('message.messages')
                  <li class="site-menu-item has-sub {{ Request::is('message') ? 'active open' : '' }}">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon fa fa-envelope-o" aria-hidden="true"></i>
                          <span class="site-menu-title">
                        {{ trans('app.messages')}}
                     </span>
                          <span class="site-menu-arrow"></span>
                      </a>
                      <ul class="site-menu-sub">
                          <li class="site-menu-item {{ Request::is('message') ? 'active' : '' }}">
                              <a class="animsition-link" href="{{URL::to('/message')}}">
                        <span class="site-menu-title">
                          {{ trans('app.messages')}}
                        </span>
                              </a>
              </li>
                  @endpermission
            <!-- Settings  menu -->
            </ul>
          </div>
        </div>
      </div>
  
  
      <div class="site-menubar-footer">
           <a href="{{URL::to('profileEdit')}}" data-placement="top" data-toggle="tooltip" data-original-title="{{ trans('app.edit_profile')}}">
            <i class="icon wb-pencil" aria-hidden="true"></i>
          </a>
         @if (Auth::user()->hasRole('gov'))
           <a href="{{URL::to('settings')}}" class="fold-show" data-placement="top" data-toggle="tooltip"
            data-original-title="{{ trans('app.settings')}}">
            <span class="icon wb-settings" aria-hidden="true"></span>
          </a>
           @else
             <a class="fold-show" data-placement="top" data-toggle="tooltip"
              data-original-title="">
              &nbsp;
            </a>
           @endif
            <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" 
                 data-placement="top" data-toggle="tooltip" 
                 data-original-title="{{ trans('app.logout')}}">
                       <span class="icon wb-power" aria-hidden="true"></span>
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                </form>
      </div>

    <li class="site-menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="animsition-link" href="{{URL::to('/dashboard')}}">
            <span class="site-menu-title">{{ trans('app.home')}}</span>
        </a>
    </li>
    </div> <!--End of Sidebar -->