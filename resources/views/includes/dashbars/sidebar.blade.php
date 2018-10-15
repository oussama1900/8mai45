<!-- Sidebar -->
<div class="site-menubar">
        <div class="site-menubar-body">
          <div>
            <div>
              <ul class="site-menu">
                <br/>
                <!-- start dashboard item -->
                <li class="site-menu-item has-sub ">
                  <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                    <span class="site-menu-title">
                      {{ trans('app.dashboard')}}
                    </span>
                    <span class="site-menu-arrow"/>
                  </a>
                  <ul class="site-menu-sub">
                    <li class="site-menu-item">
                        <router-link class="animsition-link" to="/dashboard">
                        <span class="site-menu-title">{{ trans('app.home')}}</span>
                        </router-link>
                    </li>
                      @if(Auth::user()->hasRole('gov')  ||
                          Auth::user()->hasRole('med')  ||
                          Auth::user()->hasRole('vmed')  ||
                          Auth::user()->hasRole('surv') ||
                          Auth::user()->hasRole('vgov') )
                      <li class="site-menu-item">
                          <router-link class="animsition-link" to="/dashboard/landing-page">
                              <span class="site-menu-title">{{ trans('app.landing_page')}}</span>
                          </router-link>
                      </li>
                          @endif
                      <li class="site-menu-item">
                          <router-link class="animsition-link" to="/dashboard/books">
                              <span class="site-menu-title">{{ trans('app.books')}}</span>
                          </router-link>
                      </li>
                  </ul>
                       </li>

                  <!-- end dashboard item -->

                              @if(Auth::user()->hasRole('gov'))
                  <!-- start website accounts item -->
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-lock" aria-hidden="true"></i>
                          <span class="site-menu-title">
                      {{ trans('app.website_accounts')}}
                    </span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">

                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/users-accounts"/>
                              <span class="site-menu-title">{{ trans('app.users_accounts')}}</span>
                          </li>
                      </ul>
                  </li>
                  <!-- end website accounts item -->
                    @endif
              <!-- All scouts-->
                  @if(Auth::user()->hasRole('gov')||
                      Auth::user()->hasRole('vgov'))
                      <li class="site-menu-item has-sub ">
                          <a href="javascript:void(0)">
                              <i class="site-menu-icon wb-table" aria-hidden="true"></i>
                              <span class="site-menu-title">{{ trans('app.scouts')}}</span>
                              <span class="site-menu-arrow"/>
                          </a>

                          <ul class="site-menu-sub">
                              <li class="site-menu-item">
                                  <router-link class="animsition-link" to="/dashboard/scouts/cubs"/>
                                  <span class="site-menu-title">{{ trans('app.cub')}}</span>
                                  </a>
                              </li>


                              <li class="site-menu-item">
                                  <router-link class="animsition-link" to="/dashboard/scouts/scout"/>
                                  <span class="site-menu-title">{{ trans('app.scoutboy')}}</span>
                                  </a>
                              </li>


                              <li class="site-menu-item">
                                  <router-link class="animsition-link" to="/dashboard/scouts/advanced_scout"/>
                                  <span class="site-menu-title">{{ trans('app.advanced_scout')}}</span>
                                  </a>
                              </li>


                              <li class="site-menu-item">
                                  <router-link class="animsition-link" to="/dashboard/scouts/traveler"/>
                                  <span class="site-menu-title">{{ trans('app.traveler')}}</span>
                                  </a>
                              </li>


                              <li class="site-menu-item">
                                  <router-link class="animsition-link" to="/dashboard/scouts/captain"/>
                                  <span class="site-menu-title">{{ trans('app.leader')}}</span>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  <!--start post space sidebar item-->
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-upload" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.Publish')}}</span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">
                          @if (   Auth::user()->hasRole('gov') ||
                                  Auth::user()->hasRole('vgov') ||
                                  Auth::user()->hasRole('med') ||
                                  Auth::user()->hasRole('vmed') ||
                                  Auth::user()->hasRole('ucap') ||
                                  Auth::user()->hasRole('vucp') ||
                                  Auth::user()->hasRole('capa') ||
                                  Auth::user()->hasRole('trne') ||
                                  Auth::user()->hasRole('surv') ||
                                  Auth::user()->hasRole('csd')
                                    )
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/new"/>
                              <span class="site-menu-title">{{ trans('app.post')}}</span>
                          </li>
                          @endif

                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/events/new"/>
                              <span class="site-menu-title">{{ trans('app.event')}}</span>
                          </li>
                      </ul>
                  </li>
                  <!--the forms sidebar item-->
                  @if( Auth::user()->hasRole('gov') ||
                       Auth::user()->hasRole('vgov') ||
                       Auth::user()->hasRole('ucap')

                  )
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.Administrative_Documents')}}</span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">
                          @if( Auth::user()->hasRole('gov'))
                              <li class="site-menu-item">
                                  <router-link class="animsition-link" to="/dashboard/forms"/>
                                  <span class="site-menu-title">{{ trans('app.forms')}}</span>
                              </li>
                          @endif
                          @if(Auth::user()->hasRole('ucap') ||
                          Auth::user()->hasRole('surv') ||
                          Auth::user()->hasRole('vgov') ||
                          Auth::user()->hasRole('csd')
                          )
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/form"/>
                                  <span class="site-menu-title">{{ trans('app.form')}}</span>
                          </li>
                              @endif
                              @if( Auth::user()->hasRole('gov'))
                                  <li class="site-menu-item">
                                      <router-link class="animsition-link" to="/dashboard/forms/Approve"/>
                                      <span class="site-menu-title">{{ trans('app.Approve_Correspondences')}}</span>
                                  </li>
                              @endif
                              @if(Auth::user()->hasRole('ucap') ||
                            Auth::user()->hasRole('surv') ||
                            Auth::user()->hasRole('vgov') ||
                            Auth::user()->hasRole('csd')
                            )
                              <li class="site-menu-item">
                                  <router-link class="animsition-link" to="/dashboard/forms/mypapers"/>
                                  <span class="site-menu-title">{{ trans('app.mypapers')}}</span>
                              </li>
                          @endif
                          @if( Auth::user()->hasRole('ucap'))
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/activityPaper"/>
                              <span class="site-menu-title">{{ trans('app.activityPaper')}}</span>
                          </li>
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/reports/create"/>
                                  <span class="site-menu-title">{{ trans('app.repport')}}</span>
                          </li>
                              @endif
                      </ul>
                  </li>
                  @endif


              <!-- all units events  -->
                  @if( Auth::user()->hasRole('gov') ||
                       Auth::user()->hasRole('med')  ||
                       Auth::user()->hasRole('vmed')  )
                <li class="site-menu-item has-sub">
                  <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-calendar" aria-hidden="true"></i>
                    <span class="site-menu-title">{{trans('app.Units_Events')}}</span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item">
                          <router-link class="animsition-link" to="/dashboard/Events/ApproveEvents"/>
                          <span class="site-menu-title">{{ trans('app.ApproveEvents')}}</span>
                      </li>
                    <li class="site-menu-item">
                        <router-link class="animsition-link" to="/dashboard/Events/cubs"/>
                        <span class="site-menu-title">{{trans('app.cub')}}</span>
                      </a>
                    </li>

                <li class="site-menu-item">
                        <router-link class="animsition-link" to="/dashboard/Events/Scout"/>
                        <span class="site-menu-title">{{trans('app.scoutboy')}}</span>
                      </a>
                    </li>

                      <li class="site-menu-item">
                          <router-link class="animsition-link" to="/dashboard/Events/AdvancedScout"/>
                          <span class="site-menu-title">{{trans('app.advanced_scout')}}</span>
                          </a>
                      </li>
                      <li class="site-menu-item">
                          <router-link class="animsition-link" to="/dashboard/Events/Traveler"/>
                          <span class="site-menu-title">{{trans('app.traveler')}}</span>
                          </a>
                      </li>
                      @if(Auth::user()->hasRole('gov'))
                      <li class="site-menu-item">
                          <router-link class="animsition-link" to="/dashboard/Events/Media"/>
                          <span class="site-menu-title">{{trans('app.media')}}</span>
                          </a>
                      </li>
                      @endif
                      <li class="site-menu-item">
                          <router-link class="animsition-link" to="/dashboard/Events/CSD"/>
                          <span class="site-menu-title" >{{trans('app.CSD')}}</span>
                          </a>
                      </li>
                      <li class="site-menu-item">
                          <router-link class="animsition-link" to="/dashboard/Events/SURV"/>
                          <span class="site-menu-title"  style="font-size:small">{{trans('app.SURV')}}</span>
                          </a>
                      </li>
                      <li class="site-menu-item">
                          <router-link class="animsition-link" to="/dashboard/Events/Finance"/>
                          <span class="site-menu-title" >{{trans('app.Finance')}}</span>
                          </a>
                      </li>


                </ul>
            </li>
                  @endif

                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-calendar" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.Events')}}</span>
                          <span class="site-menu-arrow"/>

                      </a>

                      <ul class="site-menu-sub">
                          <!--recived repoorts sidebar item-->
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/Events/MyEvents"/>
                              <span class="site-menu-title">{{ trans('app.MyEvents')}}</span>
                          </li>
                          @if(Auth::user()->hasRole('ucap')||
                             Auth::user()->hasRole('vucp')||
                             Auth::user()->hasRole('capa')

                               )
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/Events/ApproveEvents"/>
                              <span class="site-menu-title">{{ trans('app.ApproveEvents')}}</span>
                          </li>
                           @endif

                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/Events/Concerned"/>
                              <span class="site-menu-title">{{ trans('app.EventsConcerned')}}</span>
                              </a>
                          </li>
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/Events/Concerned/Presence"/>
                              <span class="site-menu-title">{{ trans('app.Events_Presence')}}</span>
                              </a>
                          </li>
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/Events/Concerned/absence"/>
                              <span class="site-menu-title">{{ trans('app.Events_absence')}}</span>
                              </a>
                          </li>
                          @if(Auth::user()->hasRole('trne'))
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/Events/MyEvents/Approved"/>
                              <span class="site-menu-title">{{ trans('app.Events_Approved')}}</span>
                              </a>
                          </li>
                          @endif
                          @if(Auth::user()->hasRole('ucap')||
                              Auth::user()->hasRole('vucp')||
                              Auth::user()->hasRole('capa')||
                              Auth::user()->hasRole('trne'))
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/Events/AllEvents"/>
                              <span class="site-menu-title">{{ trans('app.MyUnitEvents')}}</span>
                              </a>
                          </li>
                              @endif
                      </ul>
                  </li>

                @if(Auth::user()->hasRole('gov')||
                    Auth::user()->hasRole('med')||
                    Auth::user()->hasRole('vmed'))
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-cloud" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.Units_Posts')}}</span>
                          <span class="site-menu-arrow"/>

                      </a>

                      <ul class="site-menu-sub">
                          <!--recived repoorts sidebar item-->
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/Approve_Posts"/>
                              <span class="site-menu-title">{{ trans('app.ApprovePosts')}}</span>
                          </li>
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/cub/post"/>
                              <span class="site-menu-title">{{ trans('app.cub')}}</span>
                          </li>
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/scout/post"/>
                              <span class="site-menu-title">{{ trans('app.scoutboy')}}</span>
                          </li>
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/advanced-scout/post"/>
                              <span class="site-menu-title">{{ trans('app.advanced_scout')}}</span>
                          </li>
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/traveler/post"/>
                              <span class="site-menu-title">{{ trans('app.traveler')}}</span>
                          </li>
                            <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/captain/post"/>
                              <span class="site-menu-title">{{ trans('app.leader')}}</span>
                          </li>
                          @if(Auth::user()->hasRole('gov'))
                            <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/media/post"/>
                              <span class="site-menu-title">{{ trans('app.media')}}</span>
                          </li>
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/finance/post"/>
                              <span class="site-menu-title">{{ trans('app.Finance')}}</span>
                          </li>
                            <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/csd/post"/>
                              <span class="site-menu-title" >{{ trans('app.CSD')}}</span>
                          </li>
                          @endif
                            <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/surv/post"/>
                              <span class="site-menu-title" style="font-size:small">{{ trans('app.SURV')}}</span>
                          </li>

                      </ul>
                  </li>
                   @endif


                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon  wb-cloud" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.Posts')}}</span>
                          <span class="site-menu-arrow"/>

                      </a>

                      <ul class="site-menu-sub">
                          <!--recived repoorts sidebar item-->
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/myposts"/>
                              <span class="site-menu-title">{{ trans('app.MyPosts')}}</span>
                          </li>
                          @if(Auth::user()->hasRole('ucap') ||
                              Auth::user()->hasRole('vucp')||
                              Auth::user()->hasRole('capa')||
                              Auth::user()->hasRole('trne'))
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/myunitposts"/>
                              <span class="site-menu-title">{{ trans('app.MyUnitPosts')}}</span>
                          </li>
                          @endif
                          @if(Auth::user()->hasRole('ucap')||
                              Auth::user()->hasRole('vucp')||
                              Auth::user()->hasRole('capa'))
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/approveposts"/>
                              <span class="site-menu-title">{{ trans('app.ApprovePosts')}}</span>
                          </li>
                          @endif
                          @if(Auth::user()->hasRole('trne'))
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/posts/MyApprovedPosts"/>
                              <span class="site-menu-title">{{ trans('app.MyApprovedPosts')}}</span>
                          </li>
                              @endif
                      </ul>
                  </li>
                          <!--the Miscellaneous sidebar item-->
                  @if(Auth::user()->hasRole('gov')  || Auth::user()->hasRole('surv'))
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-add-file" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.Received repports')}}</span>
                          <span class="site-menu-arrow"/>

                      </a>

                      <ul class="site-menu-sub">  <!--recived repoorts sidebar item-->
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/reports/received"/>
                                  <span class="site-menu-title">{{ trans('app.Received repports')}}</span>
                              </a>
                          </li>
                          @if(Auth::user()->hasRole('gov') ||Auth::user()->hasRole('surv'))
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/reports/Activity"/>
                                  <span class="site-menu-title">{{ trans('app.activity_paper')}}</span>
                              </a>
                          </li>
                          @endif
                      </ul>
                  </li>

                  <!--the finance sidebar item-->
                  @endif
                  @if(Auth::user()->hasRole('gov')||
                      Auth::user()->hasRole('fin'))
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon fa fa-money" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.Finance')}}</span>
                          <span class="site-menu-arrow"/>
                      </a>

                      <ul class="site-menu-sub">  <!--my posts sidebar item-->
                          @if(Auth::user()->hasRole('fin'))
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/Finance/Repport">
                                  <span class="site-menu-title">{{ trans('app.Financial report')}}</span>
                              </router-link>
                          </li>


                      @endif
                       <!--forum sidebar item-->
                          <li class="site-menu-item">
														<router-link class="animsition-link" to="/dashboard/finance/Financial_management">
																<span class="site-menu-title">{{ trans('app.money mangment')}}</span>
														</router-link>
                          </li>

                      <!--forum sidebar item-->
                          <li class="site-menu-item">
														<router-link class="animsition-link" to="/dashboard/finance/Bank-Account">
																<span class="site-menu-title">{{ trans('app.Bank_Account')}}</span>
														</router-link>
                          </li>
                      </ul>

                  </li>
                    @endif

             <!-- my scout menu -->
                  @if(Auth::user()->hasRole('ucap') ||
                      Auth::user()->hasRole('vucp')||
                      Auth::user()->hasRole('capa')||
                      Auth::user()->hasRole('trne'))
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                          <span class="site-menu-title">{{ trans('app.my_scouts')}}</span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">  <!--my posts sidebar item-->
                          <li class="site-menu-item">
                              <router-link class="animsition-link" to="/dashboard/my_scout"/>
                                  <span class="site-menu-title">{{ trans('app.my_scouts')}}</span>
                          </li>
                      </ul>
                  </li>
                  @endif


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


      <div class="site-menubar-footer" >
          <router-link  style="width:50%" class="animsition-link" to="/dashboard/myprofile" data-placement="top" data-toggle="tooltip" data-original-title="{{ trans('app.edit_profile')}}">
            <i class="icon wb-pencil" aria-hidden="true"></i>
          </router-link>
      <!--   @if (Auth::user()->hasRole('gov'))
           <a href="{{URL::to('settings')}}" class="fold-show" data-placement="top" data-toggle="tooltip"
            data-original-title="{{ trans('app.settings')}}">
            <span class="icon wb-settings" aria-hidden="true"></span>
          </a>
           @else
             <a class="fold-show" data-placement="top" data-toggle="tooltip"
              data-original-title="">
              &nbsp;
            </a>
           @endif-->
            <a  style="width:50%" href="{{ url('/logout') }}"
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
