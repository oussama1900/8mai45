<!-- Sidebar -->
<div class="site-menubar">
        <div class="site-menubar-body">
          <div>
            <div>
              <ul class="site-menu">
                <br/>
                    <li class="site-menu-category hidden-sm hidden-md" style="margin-top:1px; text-transform:none;font-size:16px; color:white; ">
                  <b>CRUD Example</b>
                </li>
                <li class="site-menu-item has-sub {{ Request::is('dashboard') ? 'active open' : '' }}">
                  <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                    <span class="site-menu-title">
                      {{ trans('app.dashboard')}}
                    </span>
                    <span class="site-menu-arrow"/>
                  </a>			  
                  <ul class="site-menu-sub">
                    <li class="site-menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
                      <a class="animsition-link" href="{{URL::to('/dashboard')}}">
                        <span class="site-menu-title">{{ trans('app.home')}}</span>
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
                        <a class="animsition-link" href="{{URL::to('/dashboard/scouts/accounts/register')}}">
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
                    <span class="site-menu-title">posts</span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                  @permission('posts.write')
                    <li class="site-menu-item {{ Request::is('writePosts') ? 'active' : '' }}">
                      <a class="animsition-link" href="{{URL::to('/dashboard/posts')}}">
                        <span class="site-menu-title">
                          write posts
                        </span>
                      </a>
                    </li>
                  @endpermission
                  @permission('posts.approve')
                    <li class="site-menu-item {{ Request::is('approvePosts') ? 'active' : '' }}">
                      <a class="animsition-link " href="{{URL::to('/approvePosts')}}">
                        <span class="site-menu-title">
                          approve posts
                        </span>
                      </a>
                    </li>
                  @endpermission
                  <li class="site-menu-item {{ Request::is('viewPosts') ? 'active' : '' }}">
                    <a class="animsition-link " href="{{URL::to('/viewPosts')}}">
                      <span class="site-menu-title">
                        view posts
                      </span>
                    </a>
                  </li>
  
                </ul>
              </li>
              @endpermission
             <!-- language menu -->
                    @permission('languages.languages')
                     <li class="site-menu-item has-sub {{ Request::is('language') ? 'active open' : '' }}">
                  <a href="javascript:void(0)">
                          <i class="site-menu-icon fa-language" aria-hidden="true"></i>
                    <span class="site-menu-title">
                      {{ trans('app.languages')}}
                    </span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                    <li class="site-menu-item {{ Request::is('language') ? 'active' : '' }}">
                      <a class="animsition-link" href="{{URL('/language')}}">
                        <span class="site-menu-title">{{ trans('app.languages')}}</span>
                      </a>
                    </li>
                  </ul>
                </li>
                     @endpermission
            <!--roles and permission  menu -->
                  @permission(['roles.manage', 'permissions.manage'])
                     <li class="site-menu-item has-sub {{ Request::is('permissions','roles') ? 'active open' : '' }}">
                  <a href="javascript:void(0)">
                          <i class="site-menu-icon fa-lock" aria-hidden="true"></i>
                    <span class="site-menu-title">{{ trans('app.roles_and_permissions')}}</span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                        @permission('roles.manage')
                    <li class="site-menu-item {{ Request::is('roles') ? 'active' : '' }}">
                      <a class="animsition-link" href="{{URL::to('/dashboard/roles')}}">
                        <span class="site-menu-title">{{ trans('app.roles')}}</span>
                      </a>
                    </li>
                          @endpermission
                          @permission('roles.manage')
                            <li class="site-menu-item {{ Request::is('permissions') ? 'active' : '' }}">
                      <a class="animsition-link" href="{{URL::to('/dashboard/permissions')}}">
                        <span class="site-menu-title">{{ trans('app.permissions')}}</span>
                      </a>
                    </li>
                          @endpermission
                </ul>
              </li>
                  @endpermission	
            <!-- Message  menu -->
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
                  </ul>
              </li>
                  @endpermission
            <!-- Settings  menu -->
                  @permission('settings.general')
                     <li class="site-menu-item has-sub {{ Request::is('settings') ? 'active open' : '' }}">
                  <a href="javascript:void(0)">
                           <i class="site-menu-icon wb-settings" aria-hidden="true"></i>
                    <span class="site-menu-title">
                      {{ trans('app.settings')}}
                    </span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                    <li class="site-menu-item {{ Request::is('settings') ? 'active' : '' }}">
                    <a class="animsition-link" href="{{URL::to('/settings')}}">
                      <span class="site-menu-title">
                        {{ trans('app.general_settings')}}
                      </span>
                    </a>
                    </li>
                  </ul>
              </li>			
              @endpermission	
            </ul>
          </div>
        </div>
      </div><!-- End of crap that is meant to be deleted -->
  
  
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
    </div> <!--End of Sidebar -->