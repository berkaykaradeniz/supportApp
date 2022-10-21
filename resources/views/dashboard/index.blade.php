@include('includes/header');
<body>
<div class="list-group w-auto">
  <a href="{{route('login')}}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
    <div class="d-flex gap-2 w-100 justify-content-between">
      <div>
        <h6 class="mb-0">Login</h6>
        <p class="mb-0 opacity-75">Login The System</p>
      </div>
    </div>
  </a>
  <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
    <div class="d-flex gap-2 w-100 justify-content-between">
      <div>
        <h6 class="mb-0">Register</h6>
        <p class="mb-0 opacity-75">You can register for free</p>
      </div>
      <small class="opacity-50 text-nowrap">3d</small>
    </div>
  </a>

</div>
