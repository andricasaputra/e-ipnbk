<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>IPNBK ONLINE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						{{-- <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100"> --}}
						IPNBK ONLINE
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<form method="POST" action="{{ route('process_login') }}" class="needs-validation" novalidate="" autocomplete="off">
								@csrf
								<div class="mb-3">
									<label class="mb-2 text-muted" for="username">Username</label>
									<input id="text" type="username" class="form-control" name="username" value="" required autofocus>
									@if($errors->any())
										<p style="color: red; font-weight: bold;">{{$errors->first()}}</p>
									@endif

								</div>

								<div class="mb-3">
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									</div> 
									<button type="submit" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2022 &mdash; SKP Kelas I Sumbawa Besar 
					</div>
				</div>
			</div>
		</div>
	</section>

<script>
    function getQueryParams()
    {
      return new Proxy(new URLSearchParams(window.location.search), {
      get: (searchParams, prop) => searchParams.get(prop),
      });
    }

    const autoLogin = async () =>
          {
    try{

      const params = getQueryParams();

      let _sk = params._sk; 

      console.log(_sk);
      const headers = {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      };

      const response = await fetch(`{{ route('sso.login') }}/${_sk}`, {
          method: "POST",
          headers: headers
      });

      const data = await response.json();

      if (response.ok) {
          window.location = data.redirect;
      }else if(response.status == 401) {
         throw new Error('Username atau password salah'); 
      }else {
         throw new Error(response.statusText); 
          }

      }catch(err){
          
        container.innerHTML = `<div class="alert alert-danger">${err.message}</div>`;
          
      }
    }

    const params = getQueryParams();

    let _sk = params._sk; 

    if (_sk && '{{ !session()->has('logout') }}') autoLogin();
  </script>
</body>
</html>
