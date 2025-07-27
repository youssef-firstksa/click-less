<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: MetronicProduct Version: 8.2.9
Purchase: https://1.envato.market/Vm7VRE
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 09:09:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<title>{{ config('app.name') }} - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes
	</title>
	<meta charset="utf-8" />
	<meta name="description" content="
            The most advanced Tailwind CSS & Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo,
            Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions.
            Grab your copy now and get life-time updates for free.
        " />
	<meta name="keywords" content="
            tailwind, tailwindcss, metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js,
            Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates,
            free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button,
            bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon
        " />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title"
		content="{{ config('app.name') }} - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="{{ config('app.name') }} by Keenthemes" />
	<link rel="canonical" href="landing.html" />
	<link rel="shortcut icon" href="{{ asset('assets/frontend/media/logos/favicon.ico') }}" />

	<!--begin::Fonts(mandatory for all pages)-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->



	<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
	<link href="{{ asset('assets/frontend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/frontend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-52YZ3XGZJ6"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'G-52YZ3XGZJ6');
	</script>
	<script>
		// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
		if (window.top != window.self) {
			window.top.location.replace(window.self.location.href);
		}
	</script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
	<!--begin::Theme mode setup on page load-->
	<script>
		var defaultThemeMode = "light";
		var themeMode;

		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getItem("data-bs-theme") !== null) {
					themeMode = localStorage.getItem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}

			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}

			document.documentElement.setAttribute("data-bs-theme", themeMode);
		}            
	</script>
	<!--end::Theme mode setup on page load-->

	<!--begin::Root-->
	<div class="d-flex flex-column flex-root" id="kt_app_root">
		<!--begin::Header Section-->
		<div class="mb-0" id="home">
			<!--begin::Wrapper-->
			<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
				style="background-image: url({{ asset('assets/frontend/media/svg/illustrations/landing.svg') }})">
				<!--begin::Header-->
				<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
					data-kt-sticky-offset="{default: '200px', lg: '300px'}">

					<!--begin::Container-->
					<div class="container">
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center justify-content-between">
							<!--begin::Logo-->
							<div class="d-flex align-items-center flex-equal">
								<!--begin::Mobile menu toggle-->
								<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
									id="kt_landing_menu_toggle">
									<i class="ki-duotone ki-abstract-14 fs-2hx"><span class="path1"></span><span
											class="path2"></span></i> </button>
								<!--end::Mobile menu toggle-->

								<!--begin::Logo image-->
								<a href="landing.html">
									<img alt="Logo" src="{{ asset('assets/frontend/media/logos/landing.svg') }}"
										class="logo-default h-25px h-lg-30px" />
									<img alt="Logo" src="{{ asset('assets/frontend/media/logos/landing-dark.svg') }}"
										class="logo-sticky h-20px h-lg-25px" />
								</a>
								<!--end::Logo image-->
							</div>
							<!--end::Logo-->

							<!--begin::Menu wrapper-->
							<div class="d-lg-block" id="kt_header_nav_wrapper">
								<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true"
									data-kt-drawer-name="landing-menu"
									data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
									data-kt-drawer-width="200px" data-kt-drawer-direction="start"
									data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
									data-kt-swapper-mode="prepend"
									data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">

									<!--begin::Menu-->
									<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
										id="kt_landing_menu">
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
												data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
												Home </a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#how-it-works"
												data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
												How it Works </a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#achievements"
												data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
												Achievements </a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#team"
												data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
												Team </a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#portfolio"
												data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
												Portfolio </a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#pricing"
												data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
												Pricing </a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</div>
							</div>
							<!--end::Menu wrapper-->

							<!--begin::Toolbar-->
							<div class="flex-equal text-end ms-1">
								<a href="authentication/layouts/corporate/sign-in.html" class="btn btn-success">Sign
									In</a>
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->


				<!--begin::Landing hero-->
				<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
					<!--begin::Heading-->
					<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
						<!--begin::Title-->
						<h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">
							Build An Outstanding Solutions <br />
							with

							<span
								style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">The Best Theme Ever</span>
							</span>
						</h1>
						<!--end::Title-->

						<!--begin::Action-->
						<a href="index-2.html" class="btn btn-primary">Try Metronic</a>
						<!--end::Action-->
					</div>
					<!--end::Heading-->

					<!--begin::Clients-->
					<div class="d-flex flex-center flex-wrap position-relative px-5">

						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Fujifilm">
							<img src="{{ asset('assets/frontend/media/svg/brand-logos/fujifilm.svg') }}"
								class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->

						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Vodafone">
							<img src="{{ asset('assets/frontend/media/svg/brand-logos/vodafone.svg') }}"
								class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->

						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="KPMG International">
							<img src="{{ asset('assets/frontend/media/svg/brand-logos/kpmg.svg') }}"
								class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->

						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Nasa">
							<img src="{{ asset('assets/frontend/media/svg/brand-logos/nasa.svg') }}"
								class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->

						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Aspnetzero">
							<img src="{{ asset('assets/frontend/media/svg/brand-logos/aspnetzero.svg') }}"
								class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->

						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip"
							title="AON - Empower Results">
							<img src="{{ asset('assets/frontend/media/svg/brand-logos/aon.svg') }}"
								class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->

						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Hewlett-Packard">
							<img src="{{ asset('assets/frontend/media/svg/brand-logos/hp-3.svg') }}"
								class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->

						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Truman">
							<img src="{{ asset('assets/frontend/media/svg/brand-logos/truman.svg') }}"
								class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->
					</div>
					<!--end::Clients-->
				</div>
				<!--end::Landing hero-->


			</div>
			<!--end::Wrapper-->

			<!--begin::Curve bottom-->
			<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
						fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve bottom-->
		</div>
		<!--end::Header Section-->

		<main class="main-content">
			{{ $slot }}
		</main>

		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
		</div>
		<!--end::Scrolltop-->
	</div>
	<!--end::Root-->

	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
	</div>
	<!--end::Scrolltop-->


	<!--begin::Javascript-->

	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="{{ asset('assets/frontend/plugins/global/plugins.bundle.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/scripts.bundle.js') }}"></script>
	<!--end::Global Javascript Bundle-->

	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="{{ asset('assets/frontend/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
	<script src="{{ asset('assets/frontend/plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
	<!--end::Vendors Javascript-->

	<!--begin::Custom Javascript(used for this page only)-->
	<script src="{{ asset('assets/frontend/js/custom/landing.js') }}"></script>
	{{--
	<script src="{{ asset('assets/frontend/js/custom/pages/pricing/general.js') }}"></script> --}}
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 09:10:07 GMT -->

</html>