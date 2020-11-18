<!DOCTYPE html>
<html lang="en" class="govuk-template ">

<head>
    <meta charset="utf-8"/>
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0b0c0c"/>

    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon"/>
    <link rel="mask-icon" href="/assets/images/govuk-mask-icon.svg" color="#0b0c0c">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/govuk-apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="167x167" href="/assets/images/govuk-apple-touch-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/govuk-apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" href="/assets/images/govuk-apple-touch-icon.png">

    <!--[if !IE 8]><!-->
    <link href="/css/app.css" rel="stylesheet"/>
    <!--<![endif]-->

    <!--[if IE 8]>
    <link href="/css/app-ie8.css" rel="stylesheet" />
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <meta property="og:image" content="/assets/images/govuk-opengraph-image.png">
</head>

<body class="govuk-template__body ">
<script>
    document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');

</script>

@include('partials.skiplink')

@include('partials.header')

<div class="govuk-width-container">
    <main class="govuk-main-wrapper govuk-body" id="main-content" role="main">
        @include('partials.authenticationlinks')
        <h1 class="govuk-heading-xl">{{ $title }}</h1>
        @include('partials.flash-messages')
        @yield('content')
    </main>
</div>

@include('partials.footer')

<script src="/js/app.js"></script>
<script>
    window.GOVUKFrontend.initAll()
</script>
</body>

</html>
