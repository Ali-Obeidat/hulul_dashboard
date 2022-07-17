<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 19:22:41 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Manager hululmfx Dashboard</title>

    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('../../assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{asset('../../assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('../../assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('../../assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('../../assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('../../assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('../../assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{asset('../../assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    @yield('style')
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('../../assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('../../assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('../../assets/js/config.js')}}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>

<body>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">







      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


        <div class="app-brand demo ">
          <a href="/home" class="app-brand-link">
            <span class="app-brand-logo demo">

              <img src="{{asset('assets/img/logohulul.png')}}" alt="sss" class="w-50 m-auto">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Hulul</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>



        <ul class="menu-inner py-1">
          <!-- Dashboards -->
          <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Dashboards">Dashboards</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item active">
                <a href="/home" class="menu-link">
                  <div data-i18n="Analytics">Analytics</div>
                </a>
              </li>


            </ul>
          </li>

          <!-- Layouts -->

          <!-- Apps & Pages -->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manage</span>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Manage Users">Manage Users</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('users.index')}}" class="menu-link">
                  <div data-i18n="View All users">View All users</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('CompanyUsers')}}" class="menu-link">
                  <div data-i18n="View All company users">View All company users</div>
                </a>
              </li>

            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Manage Managers">Manage Managers</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('Managers.create')}}" class="menu-link">
                  <div data-i18n="Create Manager">Create Manager</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('Managers.index')}}" class="menu-link">
                  <div data-i18n="View All Managers">View All Managers</div>
                </a>
              </li>

            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class='menu-icon tf-icons bx bx-check-shield'></i>
              <div data-i18n="Manage Requests">Manage Requests</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('UsersRequests.index')}}" class="menu-link">
                  <div data-i18n="Deposit & Withdraw">Deposit & Withdraw </div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('usersDocuments.index')}}" class="menu-link">
                  <div data-i18n="usersDocuments">usersDocuments</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <div data-i18n="Real Accounts">Real Accounts</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{route('showAllRequest')}}" class="menu-link">
                      <div data-i18n="Create Account Request">Create Account Request</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{route('changeLeverageRequestPage')}}" class="menu-link">
                      <div data-i18n="Change Leverage Request">Change Leverage Request</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{route('changeBalanceRequestPage')}}" class="menu-link">
                      <div data-i18n="Change Balance Request">Change Balance Request</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <div data-i18n="Deposit Request">Deposit Request</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="{{route('ShowDepositRequestPage')}}" class="menu-link">
                          <div data-i18n="All Deposit Request">All Deposit Request</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="{{route('AcceptedDepositRequestPage')}}" class="menu-link">
                          <div data-i18n="Accepted Deposit Request">Accepted Deposit Request</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="{{route('RejectedDepositRequestPage')}}" class="menu-link">
                          <div data-i18n="Rejected Deposit Request">Rejected Deposit Request</div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <div data-i18n="Withdraw Request">Withdraw Request</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="{{route('ShowWithdrawRequestPage')}}" class="menu-link">
                          <div data-i18n="All Withdraw Request">All Withdraw Request</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="{{route('AcceptedWithdrawRequestPage')}}" class="menu-link">
                          <div data-i18n="Accepted Withdraw Request">Accepted Withdraw Request</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="{{route('RejectedWithdrawRequestPage')}}" class="menu-link">
                          <div data-i18n="Rejected Withdraw Request">Rejected Withdraw Request</div>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>

            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Manager Emails">Manager Emails</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('ManagerEmails.create')}}" class="menu-link">
                  <div data-i18n="Send New Email">Send New Email</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('ManagerEmails.index')}}" class="menu-link">
                  <div data-i18n="View All Emails">View All Emails</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Bonus">Bonus</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('bonus.create')}}" class="menu-link">
                  <div data-i18n="Add New Bonus">Add New Bonus</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('bonus.index')}}" class="menu-link">
                  <div data-i18n="View All Bonuses">View All Bonuses</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <div data-i18n="Public bonuses">Public bonuses</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{route('public-Bonus.create')}}" class="menu-link">
                      <div data-i18n="Add New Public bonuses">Add New Public bonuses</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{route('public-Bonus.index')}}" class="menu-link">
                      <div data-i18n="View All Public Bonuses">View All Public Bonuses</div>
                    </a>
                  </li>

                </ul>
              </li>
            </ul>

          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Accounts">Accounts</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('UsersAccounts.index')}}" class="menu-link">
                  <div data-i18n="View Accounts">View Accounts</div>
                </a>
              </li>

            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-food-menu"></i>
              <div data-i18n="Manage News">Manage News</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('news.index')}}" class="menu-link">
                  <div data-i18n="View News">View News</div>
                </a>
              </li>

            </ul>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('news.create')}}" class="menu-link">
                  <div data-i18n="Create News">Create News</div>
                </a>
              </li>

            </ul>
          </li>


        </ul>



      </aside>
      <!-- / Menu -->



      <!-- Layout container -->
      <div class="layout-page">





        <!-- Navbar-->




        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">











          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>


          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item navbar-search-wrapper mb-0">
                <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                  <i class="bx bx-search bx-sm"></i>
                  <span class="d-none d-md-inline-block text-muted" style="color: white !important;">Search (Ctrl+/)</span>
                </a>
              </div>
            </div>
            <!-- /Search -->





            <ul class="navbar-nav flex-row align-items-center ms-auto">

              <!-- Language -->
              <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <i class='flag-icon flag-icon-us flag-icon-squared rounded-circle fs-3 me-1'></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="en">
                      <i class="flag-icon flag-icon-us flag-icon-squared rounded-circle fs-4 me-1"></i>
                      <span class="align-middle">English</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="fr">
                      <i class="flag-icon flag-icon-fr flag-icon-squared rounded-circle fs-4 me-1"></i>
                      <span class="align-middle">France</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="de">
                      <i class="flag-icon flag-icon-de flag-icon-squared rounded-circle fs-4 me-1"></i>
                      <span class="align-middle">German</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="pt">
                      <i class="flag-icon flag-icon-pt flag-icon-squared rounded-circle fs-4 me-1"></i>
                      <span class="align-middle">Portuguese</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ Language -->




              <!-- Style Switcher -->

              <!--/ Style Switcher -->

              <!-- Quick links  -->
              <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  <i class='bx bx-grid-alt bx-sm'></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0">
                  <div class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                      <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                      <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="bx bx-sm bx-plus-circle"></i></a>
                    </div>
                  </div>
                  <div class="dropdown-shortcuts-list scrollable-container">
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                          <i class="bx bx-calendar fs-4"></i>
                        </span>
                        <a href="app-calendar.html" class="stretched-link">Calendar</a>
                        <small class="text-muted mb-0">Appointments</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                          <i class="bx bx-food-menu fs-4"></i>
                        </span>
                        <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                        <small class="text-muted mb-0">Manage Accounts</small>
                      </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                          <i class="bx bx-user fs-4"></i>
                        </span>
                        <a href="app-user-list.html" class="stretched-link">User App</a>
                        <small class="text-muted mb-0">Manage Users</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                          <i class="bx bx-check-shield fs-4"></i>
                        </span>
                        <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                        <small class="text-muted mb-0">Permission</small>
                      </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                          <i class="bx bx-pie-chart-alt-2 fs-4"></i>
                        </span>
                        <a href="index.html" class="stretched-link">Dashboard</a>
                        <small class="text-muted mb-0">User Profile</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                          <i class="bx bx-cog fs-4"></i>
                        </span>
                        <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                        <small class="text-muted mb-0">Account Settings</small>
                      </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                          <i class="bx bx-help-circle fs-4"></i>
                        </span>
                        <a href="pages-help-center-landing.html" class="stretched-link">Help Center</a>
                        <small class="text-muted mb-0">FAQs & Articles</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                          <i class="bx bx-window-open fs-4"></i>
                        </span>
                        <a href="modal-examples.html" class="stretched-link">Modals</a>
                        <small class="text-muted mb-0">Useful Popups</small>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- Quick links -->

              <!-- Notification -->
              <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  <i class="bx bx-bell bx-sm"></i>
                  <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                  <li class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                      <h5 class="text-body mb-0 me-auto">Notification</h5>
                      <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                    </div>
                  </li>
                  <li class="dropdown-notifications-list scrollable-container">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                            <p class="mb-0">Won the monthly best seller gold badge</p>
                            <small class="text-muted">1h ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Charles Franklin</h6>
                            <p class="mb-0">Accepted your connection</p>
                            <small class="text-muted">12hr ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">New Message ✉️</h6>
                            <p class="mb-0">You have new message from Natalie</p>
                            <small class="text-muted">1h ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-cart"></i></span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Whoo! You have new order 🛒 </h6>
                            <p class="mb-0">ACME Inc. made new order $1,154</p>
                            <small class="text-muted">1 day ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../assets/img/avatars/9.png" alt class="w-px-40 h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Application has been approved 🚀 </h6>
                            <p class="mb-0">Your ABC project application has been approved.</p>
                            <small class="text-muted">2 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-pie-chart-alt"></i></span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Monthly report is generated</h6>
                            <p class="mb-0">July monthly financial report is generated </p>
                            <small class="text-muted">3 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../assets/img/avatars/5.png" alt class="w-px-40 h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Send connection request</h6>
                            <p class="mb-0">Peter sent you connection request</p>
                            <small class="text-muted">4 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../assets/img/avatars/6.png" alt class="w-px-40 h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">New message from Jane</h6>
                            <p class="mb-0">Your have new message from Jane</p>
                            <small class="text-muted">5 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-warning"><i class="bx bx-error"></i></span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">CPU is running high</h6>
                            <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                            <small class="text-muted">5 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown-menu-footer border-top">
                    <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center p-3">
                      View all notifications
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ Notification -->
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="pages-account-settings-account.html">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-profile-user.html">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-account-settings-account.html">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>





                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="auth-login-cover.html" target="_blank">
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>

                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->


            </ul>
          </div>


          <!-- Search Small Screens -->
          <div class="navbar-search-wrapper search-input-wrapper  d-none">
            <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
            <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
          </div>


        </nav>



        <!-- / Navbar -->



        <!-- Content wrapper -->
        <div class="content-wrapper">

          <!-- Content -->
          @yield('content')

          <!-- / Content -->




          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>
                , made with ❤️ by <a href="" target="_blank" class="footer-link fw-bolder">Hulul mfx</a>
              </div>

            </div>
          </footer>
          <!-- / Footer -->


          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>



    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>


    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

  </div>
  <!-- / Layout wrapper -->






  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{asset('../../assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('../../assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('../../assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

  <script src="{{asset('../../assets/vendor/libs/hammer/hammer.js')}}"></script>
  <script src="{{asset('../../assets/vendor/libs/i18n/i18n.js')}}"></script>
  <script src="{{asset('../../assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>

  <script src="{{asset('../../assets/vendor/js/menu.js')}}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="{{asset('../../assets/js/main.js')}}"></script>
  <script src="{{asset('../../assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

  <!-- Page JS -->
  <script src="{{asset('../../assets/js/dashboards-analytics.js')}}"></script>
  @yield('script')
</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 19:23:34 GMT -->

</html>