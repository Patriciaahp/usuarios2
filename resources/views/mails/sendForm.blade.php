<body class="bg-light">
<div class="container">
    <div class="card p-6 p-lg-10 space-y-4">
        <h1 class="h3 fw-700">
            Here is a formulary you can fill to rate our services
        </h1>
        <p>We will be grateful if you answer a few questions</p>
        <a class="btn btn-primary p-3 fw-700"
           href="{{route('session.forms',['hash' => $session->hash, 'id' => $form->id])}}">Take the form</a>
    </div>
</div>
</body>
