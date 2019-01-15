<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <meta name="csrf-token" content="{{ csrf_token() }}"/>
   <title>Dashboard Template for Bootstrap</title>
   <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<div id="app">
   <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
         <li class="nav-item text-nowrap">
            <form action="/logout" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <button class="btn-link nav-link" type="submit">Sign out</button>
            </form>
         </li>
      </ul>
   </nav>
   <div class="container-fluid">
      <div class="row">
         <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
               <ul class="nav flex-column">
                  <li class="nav-item">
                     <a class="nav-link {{Route ::currentRouteName()=='operations'?'active':''}}" href="/operations">
                        <span data-feather="home"></span>
                        Operations
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{Route ::currentRouteName()=='items'?'active':''}}" href="/items">
                        <span data-feather="shopping-cart"></span>
                        Items
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{Route ::currentRouteName()=='groups'?'active':''}}" href="/groups">
                        <span data-feather="users"></span>
                        Items` groups
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{Route ::currentRouteName()=='accounts'?'active':''}}" href="/accounts">
                        <span data-feather="file"></span>
                        Accounts
                     </a>
                  </li>
                  {{--  <li class="nav-item">
                       <a class="nav-link" href="#">
                          <span data-feather="bar-chart-2"></span>
                          Reports
                       </a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="#">
                          <span data-feather="layers"></span>
                          Integrations
                       </a>
                    </li>--}}
               </ul>
               <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span>Saved reports</span>
                  <a class="d-flex align-items-center text-muted" href="#">
                     <span data-feather="plus-circle"></span>
                  </a>
               </h6>
               <ul class="nav flex-column mb-2">
                  <li class="nav-item">
                     <a class="nav-link" href="/accounts-balance">
                        <span data-feather="file-text"></span>
                        Accounts` balance
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Last quarter
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Social engagement
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Year-end sale
                     </a>
                  </li>
               </ul>
            </div>
         </nav>
         <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
         </main>
      </div>
   </div>
</div>
<script src="/js/app.js"></script>
</body>
</html>
