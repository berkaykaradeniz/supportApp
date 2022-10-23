@include('includes.header')

<body class="text-center">
<div class="container">
    <main class="form-signin w-100 m-auto">
        <img class="mb-4" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="name" placeholder="name">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" id="password" placeholder="Password">
            <label for="floatingPassword">
                Password
            </label>
        </div>

        <div class="mb-3">
            <label id="error"></label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" onclick="register()">Register</button>
        <p class="mt-3"><a href="{{route('login')}}">Login</a></p>
        <p class="mt-3 mb-3 text-muted">© 2017–2022</p>
    </main>

</div>

</body>
@include('includes.footer')