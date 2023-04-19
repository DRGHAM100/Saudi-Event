<!DOCTYPE html>
<html   lang="en"
class="light-style layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="../assets/"
data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    <link rel="icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/ar-core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/ar-theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/rtl-demo.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if(in_array(request()->route()->getName(),['welcome','success','badge','login.index']))
      <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/pages/ar-page-auth.css" />
    @endif
    @if(in_array(request()->route()->getName(),['attend.store']))
      <style>@media print {@page {size: 8.5cm 10.5cm; }.btn{visibility: hidden;}*{background: #fff;}
      html,body { max-height: 100%;overflow: hidden;page-break-after: always;}}</style>
    @endif
    <script src="{{asset('assets')}}/vendor/js/helpers.js"></script>
    <script src="{{asset('assets')}}/js/config.js"></script>
    @routes
    @inertiaHead
  </head>
  <body>
    
    @inertia
    <script src="{{asset('assets')}}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('assets')}}/vendor/js/bootstrap.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{asset('assets')}}/vendor/js/menu.js"></script>
    @if(Request::is('admin/*'))
      <script src="{{asset('assets')}}/vendor/libs/apex-charts/apexcharts.js"></script>
    @endif
    <script src="{{asset('assets')}}/js/main.js"></script>
    @if(Request::is('admin/*'))
      <script src="{{asset('assets')}}/js/dashboards-analytics.js"></script>
    @endif
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>