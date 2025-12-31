@include('theme.head')

<body>
  <!--================Header Menu Area =================-->
@include('theme.header')
  <!--================Header Menu Area =================-->
  
  <main class="site-main">
    <!--================Hero Banner start =================-->  

    <!--================Hero Banner end =================-->  

    <!--================ Blog slider start =================-->  
 @yield('content')
    <!--================ End Blog Post Area =================-->
  </main>

  <!--================ Start Footer Area =================-->
@include('theme.footer')
  <!--================ End Footer Area =================-->

@include('theme.script')
</body>
</html>