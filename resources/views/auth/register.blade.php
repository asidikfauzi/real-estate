
{{-- <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/> --}}

<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet"
/>
<style>
    .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
    }

    @media (min-width: 1025px) {
        .h-custom-2 {
        height: 100%;
        }
    }
</style>

<section class="vh-100">
    @include('sweetalert::alert')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4 text-black">
          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form method="POST" action="{{route('authRegister.user')}}" style="width: 23rem;">
            @csrf
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>
            <div class="form-outline mb-4">
                <label class="" for="form2Example18">Email address</label>
                <input type="email" name="email" id="form2Example18" class="form-control form-control-lg" />
                @error('email')
                    <div style="font-size: 12px; color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <label class="" for="form2Example18">Name</label>
                <input type="text" name="name" id="form2Example18" class="form-control form-control-lg" />
                @error('name')
                    <div style="font-size: 12px; color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <label class="" for="form2Example28">Password</label>
                <input type="password" name="password" id="form2Example28" class="form-control form-control-lg" />
                @error('password')
                    <div style="font-size: 12px; color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="pt-1 mb-4">
                <button type="submit" class="btn btn-info btn-lg btn-block">Register</button>
                <br>
                <center>
                <a href="{{route('authLogin')}}">Login</a>
                </center>
            </div>

          </form>

        </div>

      </div>
      <div class="col-sm-8 px-0 d-none d-sm-block">
        <img src="{{asset('assets/img/logo-login.jpg')}}"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
