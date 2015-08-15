<!DOCTYPE html>
<html>
<head>
	<title>@yield('head')</title>

	{{HTML::style('css/materialize.min.css')}}
	{{HTML::style('css/add.css')}}
	
	{{HTML::script('js/jquery.min.js')}}
	{{HTML::script('js/materialize.min.js')}}

	@yield('asset')

	<style type="text/css">
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }
        .container{width:90%}

		@yield('css')

	</style>
</head>
<body>

	<header>
		<nav class="cyan lighten-2">
	        <div class="nav-wrapper container">
	          <a class="brand-logo">Lara<strong>Pus</strong></a>
	          <ul id="nav-mobile" class="right hide-on-med-and-down">
	          	@yield('nav')
	          </ul>
	        </div>
	    </nav>
	</header>

    <main style="margin-top: 20px">
        <div class="container">
		 	@yield('breadcrumb') 
			<h4 class="center-align">{{$title}}</h4>
        	@yield('body')
        </div>
    </main>
	
    <footer class="page-footer cyan lighten-2">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Footer Content</h5>
					<p class="grey-text text-lighten-4">Lorem ipsum Reprehenderit reprehenderit in esse est amet aliquip cillum culpa reprehenderit ut ea Duis dolore nisi consectetur magna magna deserunt dolor adipisicing ut dolore deserunt Ut adipisicing pariatur eu.
					</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text"><i class="mdi-action-account-circle left"></i>Anggota</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="#!"><i class="mdi-content-add-circle left"></i>Muhammad Ryanda Putra</a></li>
						<li><a class="grey-text text-lighten-3" href="#!"><i class="mdi-content-mail left"></i>Sobri</a></li>
						<li><a class="grey-text text-lighten-3" href="#!"><i class="mdi-content-send left"></i>Piqiw</a></li>
						<li><a class="grey-text text-lighten-3" href="#!"><i class="mdi-content-archive left"></i>Mizwar</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container"> © 2015 Copyright ryandaputra </div>
		</div>
	</footer>

	<script type="text/javascript">
		$(document).ready(function() {

			@if (Session::has('pesan'))
			    @if (is_array(Session::get('pesan')))
				    @foreach(Session::get('pesan') as $get)
				        Materialize.toast('{{ $get }}', 2000);
			       	@endforeach
			    @else (Session::has('pesan'))
			        Materialize.toast(' {{Session::get('pesan')}} ', 4000);
			    @endif
			@endif
			@yield('js')

		});
	</script>
</body>
</html>