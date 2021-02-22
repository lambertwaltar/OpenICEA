<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid">
                <?php if(auth()->user()->can('administrator') || auth()->user()->username=='admin'): ?>
                  <ul class="nav navbar-nav flex-nowrap ml-auto" style="margin-left:0 !important">
                    <li role="presentation" class="nav-item" >
                      <a class="nav-link" href="<?php echo e(route('settings')); ?>" id="settings">
                        <img src="images/settings.png" title="Settings">
                        <p>Settings</p>
                      </a>
                    </li>             
                  </ul>
                <?php endif; ?>
                  <ul class="nav navbar-nav flex-nowrap ml-auto" id="menu-container">
                      <div class="d-none d-sm-block topbar-divider"></div>

                      <li role="presentation" class="nav-item" >
                          <div class="nav-link dropdown" >
                            <img src="images/notification.png" />
                             <?php if(auth()->user()->unreadNotifications): ?>
                              <span class="badge badge-danger badge-counter"></span>
                            <?php endif; ?> 
                            <p>Notifications</p>
                            <?php if(auth()->user()->unreadNotifications): ?>
                              <nav class="dropdown-content navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                                <div class="container-fluid">
                                  <ul class="nav navbar-nav flex-nowrap ml-auto notifications menu" id="menu-container" >
                                    <div class="d-none d-sm-block topbar-divider"></div>
                                  </ul>
                                </div>
                              </nav>
                            <?php endif; ?>
                          </div>
                        </li> 
                      <!-- Lab -->
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['make lab requests','view lab requests','collect lab samples','enter lab results'])): ?>
                        <li role="presentation" class="nav-item" >
                          <div class="nav-link dropdown" >
                            <img src="images/lab.png"/>
                            <p>Laboratory</p>
                            <nav class="dropdown-content navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                              <div class="container-fluid">
                                <ul class="nav navbar-nav flex-nowrap ml-auto" id="menu-container">
                                  <div class="d-none d-sm-block topbar-divider"></div>
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="<?php echo e(route('labrequisitionform')); ?>" id="newlabrequisition">
                                      <img src="images/labrequest.png" /><span>Make Lab Request</span> 
                                    </a>
                                  </li>
                                  <hr class="solid">
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="<?php echo e(route('patientlabs')); ?>" id="viewlabs">
                                      <img src="images/view.png" /> <span>View Lab Results</span>
                                    </a>
                                  </li>
                                  <hr class="solid">
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="<?php echo e(url('labrequisitions')); ?>">
                                      <img src="images/results.png" /> <span>Lab Requisitions</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </nav>
                          </div>
                        </li> 
                      <?php endif; ?>

                      <!-- prescriptions -->
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage prescriptions')): ?>
                        <li role="presentation" class="nav-item" >
                          <div class="nav-link dropdown" >
                            <img src="images/prescription.png" /> 
                            <p>Prescriptions</p>
                            <nav class="dropdown-content navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                              <div class="container-fluid">
                                <ul class="nav navbar-nav flex-nowrap ml-auto" id="menu-container">
                                  <div class="d-none d-sm-block topbar-divider"></div>
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="<?php echo e(route('newprescription')); ?>" id="newprescription">
                                      <img src="images/addprescription.png" /><span>New Prescription</span> 
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </nav>
                          </div>
                        </li> 
                      <?php endif; ?>

                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage inventory')): ?>
                        <!-- <li role="presentation" class="nav-item" >
                          <a class="nav-link" href="<?php echo e(route('stock')); ?>">
                            <img src="images/inventory.png" /> 
                            <p>Pharmacy inventory</p>
                          </a>
                        </li> -->
                      <?php endif; ?>

                      <!-- client -->
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['add clients','view clients','edit clients','delete clients','manage encounter'])): ?>
                        <li role="presentation" class="nav-item" >
                          <div class="nav-link dropdown" >
                            <img src="images/patient.png"/> 
                            <p>Client management</p>
                            <nav class="dropdown-content navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                              <div class="container-fluid">
                                <ul class="nav navbar-nav flex-nowrap ml-auto" id="menu-container">
                                  <div class="d-none d-sm-block topbar-divider"></div>
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="<?php echo e(route('enrolmenthistory')); ?>" id="enrolmenthistory">
                                      <img src="images/filehistory.png" /><span>Enrolment History</span> 
                                    </a>
                                  </li>
                                  <hr class="solid">
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="<?php echo e(route('newclientform')); ?>" id="newclient">
                                      <img src="images/newclient.png" /> <span>New Client</span>
                                    </a>
                                  </li> 
                                  <hr class="solid">
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="<?php echo e(route('encounter')); ?>" id="newencounter">
                                      <img src="images/doc.png" /> <span>New Encounter</span>
                                    </a>
                                  </li>
                                  
                                  <hr class="solid">
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="<?php echo e(url('scheduleapointment')); ?>" id="scheduleappointment">
                                      <img src="images/appointment.png" style="height: 28px;"/> <span>Schedule Next Appointment</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </nav>
                          </div>
                        </li>
                      <?php endif; ?>

					  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['add clients','view clients','edit clients','delete clients','manage encounter'])): ?>
                        <li role="presentation" class="nav-item" >
                          <a class="nav-link" href="<?php echo e(route('flowsheets')); ?>" id="flowsheets">
                            <img src="images/flowsheet.png"/> 
                            <p>Client FlowSheet</p>
                          </a>
                        </li>
                      <?php endif; ?>

                      <?php if(auth()->user()->can('administrator') || auth()->user()->username=='admin'): ?>
                        <li role="presentation" class="nav-item" >
                          <a class="nav-link" href="<?php echo e(route('user-management')); ?>">
                            <img src="images/user.png"/> 
                            <p>User management</p>
                          </a>
                        </li>
                        <li role="presentation" class="nav-item" >
                          <a class="nav-link" href="<?php echo e(route('masterlists')); ?>">
                            <img src="images/master.png"/>
                            <p>Master Lists</p>
                          </a>
                        </li>
                      <?php endif; ?>

                      <li role="presentation" class="nav-item" >
                        <a class="nav-link" href="<?php echo e(route('client-home')); ?>">
                          <img src="images/home.png"/> <p>Home</p>
                        </a>
                      </li>

                      <li role="presentation" class="nav-item" >
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>">
                          <img src="images/logout.png"/>
                          <p>Log out</p>
                        </a>
                      </li>
                  </ul>

                 

                </div>
            </nav>
            <div style="text-align:center;">
              <?php if(Session::has('success')): ?>
                    <span class="success"><?php echo e(session('success')); ?></span>
              <?php endif; ?>
              <?php if(Session::has('error')): ?>
                    <span class="error"><?php echo e(session('error')); ?></span>
              <?php endif; ?>
            </div>
            <!-- hidden attributes for JS -->
            <input type="hidden" name="patientidcno"  placeholder="Client IDCNO" /><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/User\Resources/views/partials/menu.blade.php ENDPATH**/ ?>