<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" />

  @yield('styles')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


  <title>Dashboard | {{ config('app.name', 'My site') }} | @yield('title')</title>
  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  @livewireStyles
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="text-blueGray-700 antialiased">

  <div id="root">
    @include('layouts.admin-nav')
    <div class="relative md:ml-64 bg-blueGray-50">

    @include('layouts.admin-menu')

     <!-- Page Heading -->
     @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
  </div>


  <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>

  <script type="text/javascript">
    /* Sidebar - Side navigation menu on mobile/responsive mode */
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("bg-white");
      document.getElementById(collapseID).classList.toggle("m-2");
      document.getElementById(collapseID).classList.toggle("py-3");
      document.getElementById(collapseID).classList.toggle("px-6");
    }
    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
      let element = event.target;
      while (element.nodeName !== "A") {
        element = element.parentNode;
      }
      var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
        placement: "bottom-end"
      });
      document.getElementById(dropdownID).classList.toggle("hidden");
      document.getElementById(dropdownID).classList.toggle("block");
    }

  </script>

@stack('modals')

@livewireScripts
</body>

</html>
