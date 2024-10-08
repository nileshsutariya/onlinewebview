<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Online Web View</title>

   <script src="https://code.jquery.com/jquery-3.7.1.js"></script> 
   <!-- <script src="http://localhost/orderplacing/public/dist/js/pages/dashboard.js:14:27"></script>  -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js" integrity="sha512-Y+cHVeYzi7pamIOGBwYHrynWWTKImI9G78i53+azDb1uPmU1Dz9/r2BLxGXWgOC7FhwAGsy3/9YpNYaoBy7Kzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
            <li class="nav-item">
              <a href="" class="nav-link ">
              <p>Dashboard </p>
              </a>
            </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block float-right">
          <a href="#" class="btn btn-primary"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index3.html" class="brand-link text-center ">
        <span class="brand-text font-weight-light "><h4>Online Web View</h4></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="ul">
            <li class="nav-item li">
              <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p class="ml-1">Dashboard </p>
              </a>
            </li>
            
            <li class="nav-item li">
              <a href="{{route('categories.index')}}" class="nav-link ">
                <i class="nav-icon fa-solid fa-layer-group"></i>
                <p class="ml-1">Category</p>
              </a>
            </li>

            <li class="nav-item li">
              <a href="{{route('post.index')}}" class="nav-link ">
                <i class="nav-icon fa-brands fa-usps" aria-hidden="true"></i>
              <p class="ml-1 ">Post</p>
              </a>
            </li>
            <li class="nav-item li">
              <a href="#" class="nav-link" id="menu1">
              <i class="nav-icon fa-solid fa-gear" aria-hidden="true"></i>
              <p class="ml-1 ">Settings <i class="right fas fa-angle-left"></i> </p>

              </a>
              <ul class="nav nav-treeview ul" id="submenu1">
                <li class="nav-item">
                  <a href="{{route('ads.index')}}" class="nav-link li">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ad Link</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview ul" id="submenu2">
                <li class="nav-item">
                  <a href="#" class="nav-link li">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ad View</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview ul">
                <li class="nav-item">
                  <a href="#" class="nav-link li">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Now Added Count</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview ul">
                <li class="nav-item">
                  <a href="{{route('slider.index')}}" class="nav-link li">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Slider</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    
    {{-- <script>
      $(function() {
        var current = location.pathname;
    
        // Set active class for the current page
        $('#ul li a').each(function() {
          var a = $(this);
          if (a.attr('href').indexOf(current) !== -1) {
            a.addClass('active');
          }
        });
    
        // Open submenus based on stored local storage values
        $('#ul .nav-item').each(function() {
          var menu = $(this).find('a.nav-link');
          var submenu = $(this).find('.nav-treeview');
    
          var isOpen = localStorage.getItem(menu.attr('id'));
          if (isOpen === 'true') {
            submenu.show(); // keep the submenu open
            menu.find('.fa-angle-left').addClass('rotate');
          }
    
          // Toggle submenu on click and store state
          menu.on('click', function() {
          submenu.toggle(); // open/close the submenu
          var isOpenNow = submenu.is(':visible');
          localStorage.setItem(menu.attr('id'), isOpenNow); // store open/close state
          
          // Toggle arrow rotation
          $(this).find('.fa-angle-left').toggleClass('rotate', isOpenNow);
        });

        });
      });
    </script> --}}
    
   
        <script>           
          $(function(){
          var current = location.pathname;
          
            $('#ul li a').each(function(){
              var a = $(this);
              if(a.attr('href').indexOf(current) !== -1){
                      a.addClass('active');
                  }
              })
          })
        </script>
      <div class="content-wrapper">
          @if (session('store'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-right",
                        iconColor: 'green',
                        customClass: {
                            popup: 'colored-toast'
                        },
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true 
                    });
                    Toast.fire("Message", "{{ Session::get('store') }}", 'success', {
                        icon: 'success',
                    });

                </script>
                @endif

                @if (session('update'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-right",
                        iconColor: 'green',
                        customClass: {
                            popup: 'colored-toast'
                        },
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true 
                    });
                    Toast.fire("Message", "{{ Session::get('update') }}", 'success', {
                        icon: 'success',
                    });

                </script>
                @endif

                @if (session('delete'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-right",
                        iconColor: 'green',
                        customClass: {
                            popup: 'colored-toast'
                        },
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true 
                    });
                    Toast.fire("Message", "{{ Session::get('delete') }}", 'success', {
                        icon: 'success',
                    });

                </script>
                @endif
