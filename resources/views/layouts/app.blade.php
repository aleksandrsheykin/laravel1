<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="/js/moment.min.js"></script>
	<script src="/js/js.js"></script>

	
	<!-- Select with search -->
	<script src="/js/bootstrap-select.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/css/bootstrap-select.css">
		
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Homebu.ru') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
						@if (isset($vk_link))
							<li><a href="{{ $vk_link }}">VK</a></li>
						@endif
                        <li><a href="{{ url('/login') }}">{{ trans('home.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('home.register') }}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->firstname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-euro"></span> {{ trans('home.accounting') }}</a></li>
								<li><a href="{{ route('settings') }}"><span class="glyphicon glyphicon-cog"></span> {{ trans('home.settings') }}</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
										<span class="glyphicon glyphicon-log-out"></span>
                                        {{ trans('home.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
								@if (isset($admin_link))
									<li><a href="{{ $admin_link }}">admin</a></li>
								@endif
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

	<div class="container">
    @yield('content')
	</div>
	
	<!-- Error Modal -->
	<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="errorModalTitle">{{ trans('home.confirmation delete') }}</h4>
				</div>
				<div class="modal-body" id="errorModalBody">
					{{ trans('home.delete category') }} <label id="">name</label>? 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('home.close') }}</button>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>
