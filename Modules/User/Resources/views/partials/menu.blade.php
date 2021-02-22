<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid">
                @if(auth()->user()->can('administrator') || auth()->user()->username=='admin')
                  <ul class="nav navbar-nav flex-nowrap ml-auto" style="margin-left:0 !important">
                    <li role="presentation" class="nav-item" >
                      <a class="nav-link" href="{{route('settings')}}" id="settings">
                        <img src="images/settings.png" title="Settings">
                        <p>Settings</p>
                      </a>
                    </li>             
                  </ul>
                @endif
                  <ul class="nav navbar-nav flex-nowrap ml-auto" id="menu-container">
                      <div class="d-none d-sm-block topbar-divider"></div>

                      <li role="presentation" class="nav-item" >
                          <div class="nav-link dropdown" >
                            <img src="images/notification.png" />
                             @if(auth()->user()->unreadNotifications)
                              <span class="badge badge-danger badge-counter"></span>
                            @endif 
                            <p>Notifications</p>
                            @if(auth()->user()->unreadNotifications)
                              <nav class="dropdown-content navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                                <div class="container-fluid">
                                  <ul class="nav navbar-nav flex-nowrap ml-auto notifications menu" id="menu-container" >
                                    <div class="d-none d-sm-block topbar-divider"></div>
                                  </ul>
                                </div>
                              </nav>
                            @endif
                          </div>
                        </li> 
                      <!-- Lab -->
                      @canany(['make lab requests','view lab requests','collect lab samples','enter lab results'])
                        <li role="presentation" class="nav-item" >
                          <div class="nav-link dropdown" >
                            <img src="images/lab.png"/>
                            <p>Laboratory</p>
                            <nav class="dropdown-content navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                              <div class="container-fluid">
                                <ul class="nav navbar-nav flex-nowrap ml-auto" id="menu-container">
                                  <div class="d-none d-sm-block topbar-divider"></div>
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="{{route('labrequisitionform')}}" id="newlabrequisition">
                                      <img src="images/labrequest.png" /><span>Make Lab Request</span> 
                                    </a>
                                  </li>
                                  <hr class="solid">
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="{{route('patientlabs')}}" id="viewlabs">
                                      <img src="images/view.png" /> <span>View Lab Results</span>
                                    </a>
                                  </li>
                                  <hr class="solid">
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="{{url('labrequisitions')}}">
                                      <img src="images/results.png" /> <span>Lab Requisitions</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </nav>
                          </div>
                        </li> 
                      @endcanany

                      <!-- prescriptions -->
                      @can('manage prescriptions')
                        <li role="presentation" class="nav-item" >
                          <div class="nav-link dropdown" >
                            <img src="images/prescription.png" /> 
                            <p>Prescriptions</p>
                            <nav class="dropdown-content navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                              <div class="container-fluid">
                                <ul class="nav navbar-nav flex-nowrap ml-auto" id="menu-container">
                                  <div class="d-none d-sm-block topbar-divider"></div>
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="{{route('newprescription')}}" id="newprescription">
                                      <img src="images/addprescription.png" /><span>New Prescription</span> 
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </nav>
                          </div>
                        </li> 
                      @endcan

                      @can('manage inventory')
                        <!-- <li role="presentation" class="nav-item" >
                          <a class="nav-link" href="{{route('stock')}}">
                            <img src="images/inventory.png" /> 
                            <p>Pharmacy inventory</p>
                          </a>
                        </li> -->
                      @endcan

                      <!-- client -->
                      @canany(['add clients','view clients','edit clients','delete clients','manage encounter'])
                        <li role="presentation" class="nav-item" >
                          <div class="nav-link dropdown" >
                            <img src="images/patient.png"/> 
                            <p>Client management</p>
                            <nav class="dropdown-content navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                              <div class="container-fluid">
                                <ul class="nav navbar-nav flex-nowrap ml-auto" id="menu-container">
                                  <div class="d-none d-sm-block topbar-divider"></div>
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="{{route('enrolmenthistory')}}" id="enrolmenthistory">
                                      <img src="images/filehistory.png" /><span>Enrolment History</span> 
                                    </a>
                                  </li>
                                  <hr class="solid">
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="{{route('newclientform')}}" id="newclient">
                                      <img src="images/newclient.png" /> <span>New Client</span>
                                    </a>
                                  </li> 
                                  <hr class="solid">
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="{{route('encounter')}}" id="newencounter">
                                      <img src="images/doc.png" /> <span>New Encounter</span>
                                    </a>
                                  </li>
                                  
                                  <hr class="solid">
                                  <li role="presentation" class="nav-item" >
                                    <a class="nav-link" href="{{url('scheduleapointment')}}" id="scheduleappointment">
                                      <img src="images/appointment.png" style="height: 28px;"/> <span>Schedule Next Appointment</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </nav>
                          </div>
                        </li>
                      @endcanany

					  @canany(['add clients','view clients','edit clients','delete clients','manage encounter'])
                        <li role="presentation" class="nav-item" >
                          <a class="nav-link" href="{{route('flowsheets')}}" id="flowsheets">
                            <img src="images/flowsheet.png"/> 
                            <p>Client FlowSheet</p>
                          </a>
                        </li>
                      @endcanany

                      @if(auth()->user()->can('administrator') || auth()->user()->username=='admin')
                        <li role="presentation" class="nav-item" >
                          <a class="nav-link" href="{{route('user-management')}}">
                            <img src="images/user.png"/> 
                            <p>User management</p>
                          </a>
                        </li>
                        <li role="presentation" class="nav-item" >
                          <a class="nav-link" href="{{route('masterlists')}}">
                            <img src="images/master.png"/>
                            <p>Master Lists</p>
                          </a>
                        </li>
                      @endif

                      <li role="presentation" class="nav-item" >
                        <a class="nav-link" href="{{route('client-home')}}">
                          <img src="images/home.png"/> <p>Home</p>
                        </a>
                      </li>

                      <li role="presentation" class="nav-item" >
                        <a class="nav-link" href="{{route('logout')}}">
                          <img src="images/logout.png"/>
                          <p>Log out</p>
                        </a>
                      </li>
                  </ul>

                 

                </div>
            </nav>
            <div style="text-align:center;">
              @if(Session::has('success'))
                    <span class="success">{{ session('success') }}</span>
              @endif
              @if(Session::has('error'))
                    <span class="error">{{ session('error') }}</span>
              @endif
            </div>
            <!-- hidden attributes for JS -->
            <input type="hidden" name="patientidcno"  placeholder="Client IDCNO" />