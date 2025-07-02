<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecoscene</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/admpanel/vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="/admpanel/vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="/admpanel/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="/admpanel/vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="/admpanel/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="/admpanel/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="/admpanel/vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="/admpanel/vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="/admpanel/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="/admpanel/vendor/summernote/summernote-bs4.css" />
    <link rel="stylesheet" href="/admpanel/vendor/morris/morris.css" />
    <!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />

<!-- Skin CSS -->
<link rel="stylesheet" href="css/skins/default.css" />

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="css/custom.css">

<!-- Head Libs -->
<script src="vendor/modernizr/modernizr.js"></script>
        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style>
        <style>
            .navbar {
                border-bottom: 1px solid #ddd;
            }

            .navbar-brand img {
                height: 50px;
                /* Adjust height as needed */
            }

            .navbar-nav {
                margin-left: auto;
                margin-right: auto;
                display: flex;
                width: 500px;
                justify-content: space-between;
                height: 100%;
                align-items: center;
            }
            svg{
                max-height: 40px;
                float:left;
                margin-right:10px;
            }
        </style>
        <script>
            (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
                key: "AIzaSyCRMKLOnKHf1U7RhsbxADWh80WjLS9CJro",
                v: "weekly",
                // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
                // Add other bootstrap parameters as needed, using camel case.
            });
        </script>

    </head>
    <body class="antialiased">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container" style="display:flex;justify-content: space-between;padding: 0px 15px;">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <img src="/admpanel/img/logo.png" alt="Logo" style="width: 150px;">
            </a>
            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form action="{{ route('podcasts.search') }}" class="search nav-form">
                <div class="input-group">
                    <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                    <span class="input-group-append">
								<button class="btn btn-default" type="submit" style="
    height: 100%;
    background: #e6e7e9;
    width: 45px;
    border-radius: 0px 5px 5px 0px;
"><i class="bx bx-search"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="
    width: 16px;
    height: 16px;
"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path></svg></i></button>
							</span>
                </div>
            </form>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#guilds">Guilds</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#content">Content</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact us</a>
                    </li>
                </ul>
            </div>
            <div style="
    /* width: 500px; */
    height: 50px;
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: flex-end;
">
                <div class="">
                    @if(Auth::check())
                        <!-- Ссылка для авторизованного пользователя -->
                        <a href="{{ url('/admin') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Admin Panel</a>

                    @else
                        <!-- Ссылки на Вход и Регистрацию для неавторизованного пользователя -->
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
                        <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif

                </div>
            </div>
        </div>
    </nav>

                <!-- Banner
                <header class="banner">
                                <div class="banner-image" style="background-image: url('/images/night-3078326.jpg'); height: 500px; background-size: cover; background-position: bottom;"></div>

                </header> -->

                <!-- Main Content -->
    <main class="container mt-4" style="
    padding: 0 15px;
">
<!-- start: timeline -->
<div class="timeline">
						<div class="tm-body">
							<div class="tm-title">
								<h5 class="m-0 pt-2 pb-2 text-dark font-weight-semibold text-uppercase">November 2023</h5>
							</div>
							<ol class="tm-items">
								<li>
									<div class="tm-info">
										<div class="tm-icon"><i class="fas fa-star"></i></div>
										<time class="tm-datetime" datetime="2023-11-22 19:13">
											<div class="tm-datetime-date">7 months ago</div>
											<div class="tm-datetime-time">07:13 PM</div>
									</time>
									</div>
									<div class="tm-box appear-animation" data-appear-animation="fadeInRight"data-appear-animation-delay="100">
										<p>
											It's awesome when we find a good solution for our projects, Porto Admin is <span class="text-primary">#awesome</span>
										</p>
										<div class="tm-meta">
											<span>
												<i class="bx bx-user-circle"></i> By <a href="#">John Doe</a>
											</span>
											<span>
												<i class="fas fa-tag"></i> <a href="#">Porto</a>, <a href="#">Awesome</a>
											</span>
											<span>
												<i class="fas fa-comments"></i> <a href="#">5652 Comments</a>
											</span>
										</div>
									</div>
								</li>
								<li>
									<div class="tm-info">
										<div class="tm-icon"><i class="fas fa-thumbs-up"></i></div>
										<time class="tm-datetime" datetime="2023-11-19 18:13">
											<div class="tm-datetime-date">7 months ago</div>
											<div class="tm-datetime-time">06:13 PM</div>
										</time>
									</div>
									<div class="tm-box appear-animation" data-appear-animation="fadeInRight" data-appear-animation-delay="250">
										<p>
											What is your biggest developer pain point?
										</p>
									</div>
								</li>
								<li>
									<div class="tm-info">
										<div class="tm-icon"><i class="fas fa-map-marker-alt"></i></div>
										<time class="tm-datetime" datetime="2023-11-14 17:25">
											<div class="tm-datetime-date">7 months ago</div>
											<div class="tm-datetime-time">05:25 PM</div>
										</time>
									</div>
									<div class="tm-box appear-animation" data-appear-animation="fadeInRight" data-appear-animation-delay="400">
										<p>
											<a href="#">John Doe</a> is reading a book at <span class="text-primary">New York Public Library</span>
										</p>
										<blockquote class="primary">
											<p>Learn from yesterday, live for today, hope for tomorrow. The important thing is not to stop questioning.</p>
											<small>A. Einstein,
												<cite title="Brainyquote">Brainyquote</cite>
											</small>
										</blockquote>
										<div id="gmap-checkin-example" class="mb-3" style="height: 250px; width: 100%;"></div>
										<div class="tm-meta">
											<span>
												<i class="bx bx-user-circle"></i> By <a href="#">John Doe</a>
											</span>
											<span>
												<i class="fas fa-comments"></i> <a href="#">9 Comments</a>
											</span>
										</div>
									</div>
								</li>
							</ol>
							<div class="tm-title">
								<h5 class="m-0 pt-2 pb-2 text-dark font-weight-semibold text-uppercase">September 2023</h5>
							</div>
							<ol class="tm-items">
								<li>
									<div class="tm-info">
										<div class="tm-icon"><i class="fas fa-heart"></i></div>
										<time class="tm-datetime" datetime="2023-09-08 16:13">
											<div class="tm-datetime-date">9 months ago</div>
											<div class="tm-datetime-time">04:13 PM</div>
										</time>
									</div>
									<div class="tm-box appear-animation" data-appear-animation="fadeInRight">
										<p>
											Checkout! How cool is that!
										</p>
										<div class="thumbnail-gallery">
											<a class="img-thumbnail" href="img/projects/project-4.jpg">
												<img width="215" src="img/projects/project-4.jpg">
												<span class="zoom">
													<i class="bx bx-search"></i>
												</span>
											</a>
											<a class="img-thumbnail" href="img/projects/project-3.jpg">
												<img width="215" src="img/projects/project-3.jpg">
												<span class="zoom">
													<i class="bx bx-search"></i>
												</span>
											</a>
											<a class="img-thumbnail" href="img/projects/project-2.jpg">
												<img width="215" src="img/projects/project-2.jpg">
												<span class="zoom">
													<i class="bx bx-search"></i>
												</span>
											</a>
										</div>
										<div class="tm-meta">
											<span>
												<i class="bx bx-user-circle"></i> By <a href="#">John Doe</a>
											</span>
											<span>
												<i class="fas fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a>
											</span>
											<span>
												<i class="fas fa-comments"></i> <a href="#">12 Comments</a>
											</span>
										</div>
									</div>
								</li>
								<li>
									<div class="tm-info">
										<div class="tm-icon"><i class="fas fa-video"></i></div>
										<time class="tm-datetime" datetime="2023-09-08 11:26">
											<div class="tm-datetime-date">9 months ago</div>
											<div class="tm-datetime-time">11:26 AM</div>
										</time>
									</div>
									<div class="tm-box appear-animation" data-appear-animation="fadeInRight">
										<p>
											Google Fonts gives you access to over 600 web fonts!
										</p>
										<div class="ratio ratio-16x9">
											<iframe class="embed-responsive-item" src="//player.vimeo.com/video/67957799"></iframe>
										</div>
										<div class="tm-meta">
											<span>
												<i class="bx bx-user-circle"></i> By <a href="#">John Doe</a>
											</span>
											<span>
												<i class="fas fa-thumbs-up"></i> 122 Likes
											</span>
											<span>
												<i class="fas fa-comments"></i> <a href="#">3 Comments</a>
											</span>
										</div>
									</div>
								</li>
							</ol>
						</div>
					</div>
					<!-- end: timeline -->


        <h1 style="
    text-align: center;
    font-size: 44px;
    font-weight: 600;
" id="eco">World Ecoscene</h1>
        <div id="map"></div>
        <h1 style="
    text-align: center;
    font-size: 44px;
    font-weight: 600;
" id="about">About</h1>
        <p style="
    font-size: 16px;
    margin: 16px 0px;
">“Ecoscene” is a unique term adopted from the homonym “Ecocene,” which refers to a potential nearterm geologic epoch wherein humanity transitions from the broad-scale ecosystem destruction of the
            “Anthropocene” to world-wide Earth-stewardship and compassionate care for the entire global human
            family. ECOSCENE embodies the fulfillment of this “Ecocene” vision at its core, combined with the
            experience of a “scene” – a place, a community, and a cohort of like-minded people and organizations
            working toward the Ecocene. In other words, much like proliferating mycelia webworks in forest soil
            ecology, we are the growing global “regeneration renaissance” network responding to the call of love,
            kindness, regeneration, and stewardship – for ourselves, each other, future generations, and Mother
            Earth’s sacred ecosystems alike. </p>

        <h3 style="
    font-size: 18px;
    font-weight: 600;
">AN EVOLVED SOCIAL MEDIA COMMUNITY… for GOOD</h3>
        <p style="
    font-size: 16px;
    margin: 16px 0px;
">ECOSCENE provides a refreshing alternative, a “safe place” and a digital ecosystem – social media for good
            – in which kindness, respect, reciprocity, and mutual-benefit guide our interactions. Instead of
            encouraging the rancor and vitriol all too common on conventional social media platforms (which are
            incidentally often deploying algorithms to further exacerbate this base behavior, all while singularly bent
            on maximizing profit extraction from people and companies), our evolved social media community
            instead embodies deep values and ethics of good-will, compassion, cooperation, collaboration, and
            conscious action.</p>
        <h3 style="
    font-size: 18px;
    font-weight: 600;
">A CONSCIOUS COMMERCE PLATFORM… for GOOD</h3>
        <p style="
    font-size: 16px;
    margin: 16px 0px;
">Recognizing the tremendous contributions being made to the restoration of our world, to the generation
            of dignified livelihoods, and to the transformation of our economic systems being made by mindful and
            progressively led companies and organizations, we celebrate the products, services, proprietors, and
            companies that are deliberately contributing to our enhanced health, wellbeing, and prosperity while
            working to restore and regenerate Earth’s living ecosystems. With this foundation, ECOSCENE offers
            advertising, marketing, content-sharing, and story-telling opportunities exclusively to the mindful and
            responsible companies and practitioners who meet fair-trade, organic, regenerative, B-Certified, 1% for
            the Planet, and other third party social, governance, and environmental standards. </p>
        <h3 style="
    font-size: 18px;
    font-weight: 600;
">AN EDUCATIONAL AND COMMUNITY ACTION RESOURCE HUB… for GOOD</h3>
        <p style="
    font-size: 16px;
    margin: 16px 0px;
">In addition to the social media community and commercial connections, ECOSCENE provides robust
            meeting, resource exchange, collaboration, and community-action tools for individuals, families,
            neighborhoods, faith and affinity groups, healing circles, and ecosystem restoration gatherings. By
            blending digital resources with real-life, grounded action, we are activating, amplifying, and celebrating
            the decentralized community and environmental restoration activities that are emerging world-wide and
            that need to be proliferated to realize the Ecocene vision.</p>


        <h1 style="
    text-align: center;
    font-size: 44px;
    font-weight: 600;
    margin:30px 0px;
" id="guilds">Our guilds</h1>
        <div class="row" style="min-height: 300px;">
            <div class="col-md-4">
                <div style="border: 1px solid green;">
                <p style="text-align: center;">Holistic Healer & Herbal Resources Guild</p>
                <img src="/images/space-art-5626853_640.jpg" alt="" style="max-height: 200px; margin: 20px auto;">
                <p style="padding:15px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p><br>
                <a href="#" style="text-align: right;padding:15px">more</a>
                </div>
            </div>
            <div class="col-md-4">
                <div style="border: 1px solid green;">
                <p style="text-align: center;">Architecture & Sacred Sites Guild</p>
                <img src="/images/sign-post-5655110_640.png" alt="" style="max-height: 200px; margin: 20px auto;">
                    <p style="padding:15px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p><br>
                <a href="#" style="text-align: right;padding:15px">more</a>
                </div>
            </div>
            <div class="col-md-4">
                <div style="border: 1px solid green;">
                <p style="text-align: center;">Artist Guild</p>
                <img src="/images/ai-generated-8656410_640.png" alt="" style="max-height: 200px; margin: 20px auto;">
                    <p style="padding:15px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p><br>
                <a href="#" style="text-align: right;padding:15px">more</a>
                </div>
            </div>
        </div>


        <h1 style="
    text-align: center;
    font-size: 44px;
    font-weight: 600;
    margin:30px 0px;
" id="content">Our content</h1>
        <div class="row" style="height: 100px;">
            <div class="col-md-3">YonEarth Community podcast</div>
            <div class="col-md-3">Gardening Video Course </div>
            <div class="col-md-3">Y on Earth book</div>
            <div class="col-md-3">Viriditas boob</div>
        </div>

        <h1 style="
    text-align: center;
    font-size: 44px;
    font-weight: 600;
    margin:30px 0px;
" id="projects">Our supported projects</h1>
        <div class="row" style="height: 100px;">
            <div class="col-md-3">Mantle of Hope (Uganda)</div>
            <div class="col-md-3">A vital bond (Mongolia)</div>
        </div>


        <h1 style="
    text-align: center;
    font-size: 44px;
    font-weight: 600;
    margin:30px 0px;
" id="contact">Contact us</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="tcb-col tve_empty_dropzone row">
                    <div class="thrv_wrapper thrv_text_element col-md-4" data-tag="h4">
                        <h4 class="">Social</h4>
                    <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box" data-css="tve-u-16384b1818f" id="ec-contact-form-social-box">
                        <div class="tve-content-box-background"></div>
                        <div class="tve-cb tve_empty_dropzone">
                            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width: 454.539;"><div class="tcb-flex-row tcb-medium-no-wrap tcb--cols--5" data-css="tve-u-16384b1818d"><div class="tcb-flex-col"><div class="tcb-col tve_empty_dropzone"><a href="https://www.instagram.com/yonearthcommunity/" target="_blank" rel="" class="tve_empty_dropzone"><div class="thrv_wrapper thrv_icon tcb-icon-display tve_evt_manager_listen tve_et_mouseover tve_ea_thrive_animation tcb-local-vars-root tve_anim_grow" data-css="tve-u-16384b18191" data-tcb-events="__TCB_EVENT_[{&quot;t&quot;:&quot;mouseover&quot;,&quot;config&quot;:{&quot;anim&quot;:&quot;grow&quot;,&quot;loop&quot;:1},&quot;a&quot;:&quot;thrive_animation&quot;}]_TNEVE_BCT__" style="" data-link-wrap="1"><svg class="tcb-icon" viewBox="0 0 24 28" data-name="instagram">
                                                        <path d="M16 14c0-2.203-1.797-4-4-4s-4 1.797-4 4 1.797 4 4 4 4-1.797 4-4zM18.156 14c0 3.406-2.75 6.156-6.156 6.156s-6.156-2.75-6.156-6.156 2.75-6.156 6.156-6.156 6.156 2.75 6.156 6.156zM19.844 7.594c0 0.797-0.641 1.437-1.437 1.437s-1.437-0.641-1.437-1.437 0.641-1.437 1.437-1.437 1.437 0.641 1.437 1.437zM12 4.156c-1.75 0-5.5-0.141-7.078 0.484-0.547 0.219-0.953 0.484-1.375 0.906s-0.688 0.828-0.906 1.375c-0.625 1.578-0.484 5.328-0.484 7.078s-0.141 5.5 0.484 7.078c0.219 0.547 0.484 0.953 0.906 1.375s0.828 0.688 1.375 0.906c1.578 0.625 5.328 0.484 7.078 0.484s5.5 0.141 7.078-0.484c0.547-0.219 0.953-0.484 1.375-0.906s0.688-0.828 0.906-1.375c0.625-1.578 0.484-5.328 0.484-7.078s0.141-5.5-0.484-7.078c-0.219-0.547-0.484-0.953-0.906-1.375s-0.828-0.688-1.375-0.906c-1.578-0.625-5.328-0.484-7.078-0.484zM24 14c0 1.656 0.016 3.297-0.078 4.953-0.094 1.922-0.531 3.625-1.937 5.031s-3.109 1.844-5.031 1.937c-1.656 0.094-3.297 0.078-4.953 0.078s-3.297 0.016-4.953-0.078c-1.922-0.094-3.625-0.531-5.031-1.937s-1.844-3.109-1.937-5.031c-0.094-1.656-0.078-3.297-0.078-4.953s-0.016-3.297 0.078-4.953c0.094-1.922 0.531-3.625 1.937-5.031s3.109-1.844 5.031-1.937c1.656-0.094 3.297-0.078 4.953-0.078s3.297-0.016 4.953 0.078c1.922 0.094 3.625 0.531 5.031 1.937s1.844 3.109 1.937 5.031c0.094 1.656 0.078 3.297 0.078 4.953z"></path>
                                                    </svg></div></a></div></div><div class="tcb-flex-col"><div class="tcb-col tve_empty_dropzone"><a href="https://twitter.com/yonearthworld" target="_blank" rel="" class="tve_empty_dropzone"><div class="thrv_wrapper thrv_icon tcb-icon-display tve_evt_manager_listen tve_et_mouseover tve_ea_thrive_animation tve_anim_grow" data-css="tve-u-16384b18192" data-tcb-events="__TCB_EVENT_[{&quot;t&quot;:&quot;mouseover&quot;,&quot;config&quot;:{&quot;anim&quot;:&quot;grow&quot;,&quot;loop&quot;:1},&quot;a&quot;:&quot;thrive_animation&quot;}]_TNEVE_BCT__" style="" data-link-wrap="1"><svg class="tcb-icon" viewBox="0 0 26 28" data-name="twitter">
                                                        <path d="M25.312 6.375c-0.688 1-1.547 1.891-2.531 2.609 0.016 0.219 0.016 0.438 0.016 0.656 0 6.672-5.078 14.359-14.359 14.359-2.859 0-5.516-0.828-7.75-2.266 0.406 0.047 0.797 0.063 1.219 0.063 2.359 0 4.531-0.797 6.266-2.156-2.219-0.047-4.078-1.5-4.719-3.5 0.313 0.047 0.625 0.078 0.953 0.078 0.453 0 0.906-0.063 1.328-0.172-2.312-0.469-4.047-2.5-4.047-4.953v-0.063c0.672 0.375 1.453 0.609 2.281 0.641-1.359-0.906-2.25-2.453-2.25-4.203 0-0.938 0.25-1.797 0.688-2.547 2.484 3.062 6.219 5.063 10.406 5.281-0.078-0.375-0.125-0.766-0.125-1.156 0-2.781 2.25-5.047 5.047-5.047 1.453 0 2.766 0.609 3.687 1.594 1.141-0.219 2.234-0.641 3.203-1.219-0.375 1.172-1.172 2.156-2.219 2.781 1.016-0.109 2-0.391 2.906-0.781z"></path>
                                                    </svg></div></a></div></div><div class="tcb-flex-col"><div class="tcb-col tve_empty_dropzone"><a href="https://www.facebook.com/yonearthworld/" target="_blank" rel="" class="tve_empty_dropzone"><div class="thrv_wrapper thrv_icon tcb-icon-display tve_evt_manager_listen tve_et_mouseover tve_ea_thrive_animation tve_anim_grow" data-css="tve-u-16384b18193" data-tcb-events="__TCB_EVENT_[{&quot;t&quot;:&quot;mouseover&quot;,&quot;config&quot;:{&quot;anim&quot;:&quot;grow&quot;,&quot;loop&quot;:1},&quot;a&quot;:&quot;thrive_animation&quot;}]_TNEVE_BCT__" style="" data-link-wrap="1"><svg class="tcb-icon" viewBox="0 0 16 28" data-name="facebook">
                                                        <path d="M14.984 0.187v4.125h-2.453c-1.922 0-2.281 0.922-2.281 2.25v2.953h4.578l-0.609 4.625h-3.969v11.859h-4.781v-11.859h-3.984v-4.625h3.984v-3.406c0-3.953 2.422-6.109 5.953-6.109 1.687 0 3.141 0.125 3.563 0.187z"></path>
                                                    </svg></div></a></div></div><div class="tcb-flex-col"><div class="tcb-col"><a href="https://www.linkedin.com/in/aaron-william-perry/" target="_blank" rel="" class="tve_empty_dropzone"><div class="thrv_wrapper thrv_icon tcb-icon-display tve_evt_manager_listen tve_et_mouseover tve_ea_thrive_animation tve_anim_grow" data-css="tve-u-165b233e833" data-tcb-events="__TCB_EVENT_[{&quot;t&quot;:&quot;mouseover&quot;,&quot;config&quot;:{&quot;anim&quot;:&quot;grow&quot;,&quot;loop&quot;:1},&quot;a&quot;:&quot;thrive_animation&quot;}]_TNEVE_BCT__" style="" data-link-wrap="1"><svg class="tcb-icon" viewBox="0 0 448 512" data-id="icon-linkedin-brands" data-name="LinkedIn">
                                                        <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                                    </svg></div></a></div></div><div class="tcb-flex-col"><div class="tcb-col tve_empty_dropzone"><a href="https://www.youtube.com/channel/UCM363tXv9qFzbq1i5-OvZaA" target="_blank" rel="" class="tve_empty_dropzone"><div class="thrv_wrapper thrv_icon tcb-icon-display tve_evt_manager_listen tve_et_mouseover tve_ea_thrive_animation tve_anim_grow" data-css="tve-u-16384b18190" data-tcb-events="__TCB_EVENT_[{&quot;t&quot;:&quot;mouseover&quot;,&quot;config&quot;:{&quot;anim&quot;:&quot;grow&quot;,&quot;loop&quot;:1},&quot;a&quot;:&quot;thrive_animation&quot;}]_TNEVE_BCT__" style="" data-link-wrap="1"><svg class="tcb-icon" viewBox="0 0 24 28" data-name="youtube">
                                                        <path d="M15.172 19.437v3.297c0 0.703-0.203 1.047-0.609 1.047-0.234 0-0.469-0.109-0.703-0.344v-4.703c0.234-0.234 0.469-0.344 0.703-0.344 0.406 0 0.609 0.359 0.609 1.047zM20.453 19.453v0.719h-1.406v-0.719c0-0.703 0.234-1.062 0.703-1.062s0.703 0.359 0.703 1.062zM5.359 16.047h1.672v-1.469h-4.875v1.469h1.641v8.891h1.563v-8.891zM9.859 24.938h1.391v-7.719h-1.391v5.906c-0.313 0.438-0.609 0.656-0.891 0.656-0.187 0-0.297-0.109-0.328-0.328-0.016-0.047-0.016-0.219-0.016-0.547v-5.688h-1.391v6.109c0 0.547 0.047 0.906 0.125 1.141 0.125 0.391 0.453 0.578 0.906 0.578 0.5 0 1.031-0.313 1.594-0.953v0.844zM16.562 22.625v-3.078c0-0.719-0.031-1.234-0.141-1.547-0.172-0.578-0.562-0.875-1.109-0.875-0.516 0-1 0.281-1.453 0.844v-3.391h-1.391v10.359h1.391v-0.75c0.469 0.578 0.953 0.859 1.453 0.859 0.547 0 0.938-0.297 1.109-0.859 0.109-0.328 0.141-0.844 0.141-1.563zM21.844 22.469v-0.203h-1.422c0 0.562-0.016 0.875-0.031 0.953-0.078 0.375-0.281 0.562-0.625 0.562-0.484 0-0.719-0.359-0.719-1.078v-1.359h2.797v-1.609c0-0.828-0.141-1.422-0.422-1.813-0.406-0.531-0.953-0.797-1.656-0.797-0.719 0-1.266 0.266-1.672 0.797-0.297 0.391-0.438 0.984-0.438 1.813v2.703c0 0.828 0.156 1.437 0.453 1.813 0.406 0.531 0.953 0.797 1.687 0.797s1.313-0.281 1.687-0.828c0.172-0.25 0.297-0.531 0.328-0.844 0.031-0.141 0.031-0.453 0.031-0.906zM12.344 8.203v-3.281c0-0.719-0.203-1.078-0.672-1.078-0.453 0-0.672 0.359-0.672 1.078v3.281c0 0.719 0.219 1.094 0.672 1.094 0.469 0 0.672-0.375 0.672-1.094zM23.578 19.938c0 1.797-0.016 3.719-0.406 5.469-0.297 1.234-1.297 2.141-2.5 2.266-2.875 0.328-5.781 0.328-8.672 0.328s-5.797 0-8.672-0.328c-1.203-0.125-2.219-1.031-2.5-2.266-0.406-1.75-0.406-3.672-0.406-5.469v0c0-1.813 0.016-3.719 0.406-5.469 0.297-1.234 1.297-2.141 2.516-2.281 2.859-0.313 5.766-0.313 8.656-0.313s5.797 0 8.672 0.313c1.203 0.141 2.219 1.047 2.5 2.281 0.406 1.75 0.406 3.656 0.406 5.469zM7.984 0h1.594l-1.891 6.234v4.234h-1.563v-4.234c-0.141-0.766-0.453-1.859-0.953-3.313-0.344-0.969-0.688-1.953-1.016-2.922h1.656l1.109 4.109zM13.766 5.203v2.734c0 0.828-0.141 1.453-0.438 1.844-0.391 0.531-0.938 0.797-1.656 0.797-0.703 0-1.25-0.266-1.641-0.797-0.297-0.406-0.438-1.016-0.438-1.844v-2.734c0-0.828 0.141-1.437 0.438-1.828 0.391-0.531 0.938-0.797 1.641-0.797 0.719 0 1.266 0.266 1.656 0.797 0.297 0.391 0.438 1 0.438 1.828zM19 2.672v7.797h-1.422v-0.859c-0.562 0.656-1.094 0.969-1.609 0.969-0.453 0-0.781-0.187-0.922-0.578-0.078-0.234-0.125-0.609-0.125-1.172v-6.156h1.422v5.734c0 0.328 0 0.516 0.016 0.547 0.031 0.219 0.141 0.344 0.328 0.344 0.281 0 0.578-0.219 0.891-0.672v-5.953h1.422z"></path>
                                                    </svg></div></a></div></div></div></div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-4">
                        <div class="thrv_wrapper thrv_text_element" data-tag="h4"><h4 class="">Email</h4></div>
                        <div class="thrv_wrapper thrv_text_element tve_empty_dropzone"><p>connect@yonearth.org</p></div>
                    </div>
                    <div class="col-md-4">
                        <div class="thrv_wrapper thrv_text_element" data-tag="h4"><h4 class="">Address</h4></div>
                        <div class="thrv_wrapper thrv_text_element tve_empty_dropzone"><p>Y On Earth<br>PO Box 2333<br>Boulder, CO 80306</p></div></div>
                    </div>
            </div>
        </div>

        <footer style="height:400px">

        </footer>
    </main>




    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

<!-- Vendor -->

<script src="/admpanel/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="/admpanel/vendor/popper/umd/popper.min.js"></script>
<script src="/admpanel/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/admpanel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admpanel/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/admpanel/vendor/common/common.js"></script>
<script src="/admpanel/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/admpanel/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/admpanel/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<!-- Specific Page Vendor -->
<script src="/admpanel/vendor/jquery-ui/jquery-ui.js"></script>
<script src="/admpanel/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="/admpanel/vendor/jquery-appear/jquery.appear.js"></script>
<script src="/admpanel/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script src="/admpanel/vendor/jquery.easy-pie-chart/jquery.easypiechart.js"></script>
<script src="/admpanel/vendor/flot/jquery.flot.js"></script>
<script src="/admpanel/vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
<script src="/admpanel/vendor/flot/jquery.flot.pie.js"></script>
<script src="/admpanel/vendor/flot/jquery.flot.categories.js"></script>
<script src="/admpanel/vendor/flot/jquery.flot.resize.js"></script>
<script src="/admpanel/vendor/jquery-sparkline/jquery.sparkline.js"></script>
<script src="/admpanel/vendor/raphael/raphael.js"></script>
<script src="/admpanel/vendor/morris/morris.js"></script>
<script src="/admpanel/vendor/gauge/gauge.js"></script>
<script src="/admpanel/vendor/snap.svg/snap.svg.js"></script>
<script src="/admpanel/vendor/liquid-meter/liquid.meter.js"></script>
<script src="/admpanel/vendor/jqvmap/jquery.vmap.js"></script>
<script src="/admpanel/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
<script src="/admpanel/vendor/summernote/summernote-bs4.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="/admpanel/js/theme.js"></script>
<!-- Theme Custom -->
<script src="/admpanel/js/custom.js"></script>
<!-- Theme Initialization Files -->
<script src="/admpanel/js/theme.init.js"></script>

<!-- Examples -->
<script src="/admpanel/js/examples/examples.timeline.js"></script>


    </body>
</html>
