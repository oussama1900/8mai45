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
                      <?php echo e(trans('app.dashboard')); ?>

                    </span>
                    <span class="site-menu-arrow"/>
                  </a>			  
                  <ul class="site-menu-sub">
                    <li class="site-menu-item <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>">
                      <a class="animsition-link" href="<?php echo e(URL::to('/dashboard')); ?>">
                        <span class="site-menu-title"><?php echo e(trans('app.home')); ?></span>
                      </a>
                    </li>
                  </ul>
                       </li>

                  <!--the forms sidebar item-->
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                          <span class="site-menu-title"><?php echo e(trans('app.add file')); ?></span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">
                          <li class="site-menu-item <?php echo e(Request::is('#') ? 'active' : ''); ?>">
                              <a class="animsition-link" href="<?php echo e(URL::to('/#')); ?>">
                                  <span class="site-menu-title"><?php echo e(trans('app.form')); ?></span>
                              </a>
                          </li>
                          <li class="site-menu-item <?php echo e(Request::is('#') ? 'active' : ''); ?>">
                              <a class="animsition-link" href="<?php echo e(URL::to('/#')); ?>">
                                  <span class="site-menu-title"><?php echo e(trans('app.repport')); ?></span>
                              </a>
                          </li>
                      </ul>
                  </li>
  
                   <!-- Users menu -->	
                 <?php if (\Entrust::can(['users.manage', 'users.activity'])) : ?>	         
                         <li class="site-menu-item has-sub">
                    <a href="javascript:void(0)">
                             <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                       <span class="site-menu-title"><?php echo e(trans('app.users')); ?></span>
                       <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                      <?php if (\Entrust::can('users.manage')) : ?> 
                        <li class="site-menu-item <?php echo e(Request::is('registration') ? 'active' : ''); ?>">
                        <router-link class="animsition-link" to="/dashboard/scouts/accounts/register">
                        <span class="site-menu-title"><?php echo e(trans('app.add_user')); ?></span>
                        </a>
                      </li>
                      <li class="site-menu-item <?php echo e(Request::is('userlist') ? 'active' : ''); ?>">
                        <a class="animsition-link " href="<?php echo e(URL::to('userlist')); ?>">
                        <span class="site-menu-title"><?php echo e(trans('app.users')); ?></span>
                        </a>
                      </li>
                              <?php endif; // Entrust::can ?>
                              <?php if (\Entrust::can('users.activity')) : ?> 
                      <li class="site-menu-item <?php echo e(Request::is('activity') ? 'active' : ''); ?>">
                        <a class="animsition-link" href="<?php echo e(URL::to('activity')); ?>">
                          <span class="site-menu-title"><?php echo e(trans('app.activity_log')); ?></span>
                        </a>
                      </li>  
                              <?php endif; // Entrust::can ?>
                    </ul>			  
                   </li>
                  <?php endif; // Entrust::can ?>
  
              <!-- posts menu -->
              <?php if (\Entrust::can(['posts.write', 'posts.approve'])) : ?>
                <li class="site-menu-item has-sub <?php echo e(Request::is('writePosts','approvePosts','viewPosts') ? 'active' : ''); ?>">
                  <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-quote-right" aria-hidden="true"></i>
                    <span class="site-menu-title"><?php echo e(trans('app.Publish')); ?></span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                  <?php if (\Entrust::can('posts.write')) : ?>
                    <li class="site-menu-item <?php echo e(Request::is('writePosts') ? 'active' : ''); ?>">
                      <a class="animsition-link" href="<?php echo e(URL::to('/dashboard/posts')); ?>">
                        <span class="site-menu-title"><?php echo e(trans('app.post')); ?></span>
                      </a>
                    </li>
                  <?php endif; // Entrust::can ?>
                  <?php if (\Entrust::can('posts.approve')) : ?>
                    <li class="site-menu-item <?php echo e(Request::is('approvePosts') ? 'active' : ''); ?>">
                      <a class="animsition-link " href="<?php echo e(URL::to('/approvePosts')); ?>">
                        <span class="site-menu-title"><?php echo e(trans('app.event')); ?></span>
                      </a>
                    </li>
                  <?php endif; // Entrust::can ?>

  
                </ul>
              </li>
              <?php endif; // Entrust::can ?>
                  <!--the Miscellaneous sidebar item-->
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                          <span class="site-menu-title"><?php echo e(trans('app.Miscellaneous')); ?></span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">  <!--my posts sidebar item-->
                          <li class="site-menu-item <?php echo e(Request::is('#') ? 'active' : ''); ?>">
                              <a class="animsition-link" href="<?php echo e(URL::to('/#')); ?>">
                                  <span class="site-menu-title"><?php echo e(trans('app.my posts')); ?></span>
                              </a>
                          </li>
                      </ul>
                      <ul class="site-menu-sub">  <!--forum sidebar item-->
                          <li class="site-menu-item <?php echo e(Request::is('#') ? 'active' : ''); ?>">
                              <a class="animsition-link" href="<?php echo e(URL::to('/#')); ?>">
                                  <span class="site-menu-title"><?php echo e(trans('app.forum')); ?></span>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!--the Miscellaneous sidebar item-->
                  <li class="site-menu-item has-sub ">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon wb-table" aria-hidden="true"></i>
                          <span class="site-menu-title"><?php echo e(trans('app.Finance')); ?></span>
                          <span class="site-menu-arrow"/>
                      </a>
                      <ul class="site-menu-sub">  <!--my posts sidebar item-->
                          <li class="site-menu-item <?php echo e(Request::is('#') ? 'active' : ''); ?>">
                              <a class="animsition-link" href="<?php echo e(URL::to('/#')); ?>">
                                  <span class="site-menu-title"><?php echo e(trans('app.Financial report')); ?></span>
                              </a>
                          </li>
                      </ul>
                      <ul class="site-menu-sub">  <!--forum sidebar item-->
                          <li class="site-menu-item <?php echo e(Request::is('#') ? 'active' : ''); ?>">
                              <a class="animsition-link" href="<?php echo e(URL::to('/#')); ?>">
                                  <span class="site-menu-title"><?php echo e(trans('app.money mangment')); ?></span>
                              </a>
                          </li>
                      </ul>
                      <ul class="site-menu-sub">  <!--forum sidebar item-->
                          <li class="site-menu-item <?php echo e(Request::is('#') ? 'active' : ''); ?>">
                              <a class="animsition-link" href="<?php echo e(URL::to('/#')); ?>">
                                  <span class="site-menu-title"><?php echo e(trans('app.Equipment')); ?></span>
                              </a>
                          </li>
                      </ul>
                  </li>
             <!-- language menu -->
                    <?php if (\Entrust::can('languages.languages')) : ?>
                     <li class="site-menu-item has-sub <?php echo e(Request::is('language') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                          <i class="site-menu-icon fa-language" aria-hidden="true"></i>
                    <span class="site-menu-title">
                      <?php echo e(trans('app.languages')); ?>

                    </span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                    <li class="site-menu-item <?php echo e(Request::is('language') ? 'active' : ''); ?>">
                      <a class="animsition-link" href="<?php echo e(URL('/language')); ?>">
                        <span class="site-menu-title"><?php echo e(trans('app.languages')); ?></span>
                      </a>
                    </li>
                  </ul>
                </li>
                     <?php endif; // Entrust::can ?>
            <!--roles and permission  menu -->
                  <?php if (\Entrust::can(['roles.manage', 'permissions.manage'])) : ?>
                     <li class="site-menu-item has-sub <?php echo e(Request::is('permissions','roles') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                          <i class="site-menu-icon fa-lock" aria-hidden="true"></i>
                    <span class="site-menu-title"><?php echo e(trans('app.roles_and_permissions')); ?></span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                        <?php if (\Entrust::can('roles.manage')) : ?>
                    <li class="site-menu-item <?php echo e(Request::is('roles') ? 'active' : ''); ?>">
                      <a class="animsition-link" href="<?php echo e(URL::to('/dashboard/roles')); ?>">
                        <span class="site-menu-title"><?php echo e(trans('app.roles')); ?></span>
                      </a>
                    </li>
                          <?php endif; // Entrust::can ?>
                          <?php if (\Entrust::can('roles.manage')) : ?>
                            <li class="site-menu-item <?php echo e(Request::is('permissions') ? 'active' : ''); ?>">
                      <a class="animsition-link" href="<?php echo e(URL::to('/dashboard/permissions')); ?>">
                        <span class="site-menu-title"><?php echo e(trans('app.permissions')); ?></span>
                      </a>
                    </li>
                          <?php endif; // Entrust::can ?>
                </ul>
              </li>
                  <?php endif; // Entrust::can ?>	

                    </li>
                  </ul><!-- Message  menu -->
                         <?php if (\Entrust::can('message.messages')) : ?>
                  <li class="site-menu-item has-sub <?php echo e(Request::is('message') ? 'active open' : ''); ?>">
                      <a href="javascript:void(0)">
                          <i class="site-menu-icon fa fa-envelope-o" aria-hidden="true"></i>
                          <span class="site-menu-title">
                        <?php echo e(trans('app.messages')); ?>

                     </span>
                          <span class="site-menu-arrow"></span>
                      </a>
                      <ul class="site-menu-sub">
                          <li class="site-menu-item <?php echo e(Request::is('message') ? 'active' : ''); ?>">
                              <a class="animsition-link" href="<?php echo e(URL::to('/message')); ?>">
                        <span class="site-menu-title">
                          <?php echo e(trans('app.messages')); ?>

                        </span>
                              </a>
              </li>
                  <?php endif; // Entrust::can ?>
            </ul>
          </div>
        </div>
      </div>
  
  
      <div class="site-menubar-footer">
           <a href="<?php echo e(URL::to('profileEdit')); ?>" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo e(trans('app.edit_profile')); ?>">
            <i class="icon wb-pencil" aria-hidden="true"></i>
          </a>
         <?php if(Auth::user()->hasRole('gov')): ?>
           <a href="<?php echo e(URL::to('settings')); ?>" class="fold-show" data-placement="top" data-toggle="tooltip"
            data-original-title="<?php echo e(trans('app.settings')); ?>">
            <span class="icon wb-settings" aria-hidden="true"></span>
          </a>
           <?php else: ?>
             <a class="fold-show" data-placement="top" data-toggle="tooltip"
              data-original-title="">
              &nbsp;
            </a>
           <?php endif; ?>
            <a href="<?php echo e(url('/logout')); ?>"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" 
                 data-placement="top" data-toggle="tooltip" 
                 data-original-title="<?php echo e(trans('app.logout')); ?>">
                       <span class="icon wb-power" aria-hidden="true"></span>
                </a>
                <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                     <?php echo e(csrf_field()); ?>

                </form>
      </div>

    <li class="site-menu-item <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>">
        <a class="animsition-link" href="<?php echo e(URL::to('/dashboard')); ?>">
            <span class="site-menu-title"><?php echo e(trans('app.home')); ?></span>
        </a>
    </li>
    </div> <!--End of Sidebar -->