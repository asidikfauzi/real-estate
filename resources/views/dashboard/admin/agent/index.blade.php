@extends('header-footer.index')

@section('content')

  <main id="main">
    <!-- =======Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Daftar Agent</h1>
              <span class="color-text-a"><a href="{{route('admin.agent.create')}}">Tambah Agent</a></span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Agents Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Agents Grid ======= -->
    <section class="agents-grid grid">
      <div class="container">
        <div class="row">
            @foreach ($agents as $item)
            <div class="col-md-4">
                <div class="card-box-d">
                  <div class="card-img-d" style="height: 450px;">
                    <img src="{{asset('assets/img/agent/'.$item->image)}}" alt="" class="img-d img-fluid" style="width: 100%; height:100%; object-fit: cover;">
                  </div>
                  <div class="card-overlay card-overlay-hover">
                    <div class="card-header-d">
                      <div class="card-title-d align-self-center">
                        <h3 class="title-d">
                          <a href="#" class="link-two">{{$item->name}}
                        </h3>
                      </div>
                    </div>
                    <div class="card-body-d">
                        <p class="content-d color-text-a">
                          {{$item->keterangan}}
                        </p>
                        <div class="info-agents color-a">
                          <p>
                            <strong>Phone: </strong> {{$item->no_telp}}
                          </p>
                          <p>
                            <strong>Email: </strong> {{$item->email}}
                          </p>
                          <a href="{{route('admin.agent.edit', $item->id)}}" class="btn btn-a mt-5">Edit</a>
                          <a href="{{route('admin.agent.edit', $item->id)}}" class="btn btn-a mt-5" style="background: red">Delete</a>
                        </div>

                      </div>
                    <div class="card-footer-d">
                      <div class="socials-footer d-flex justify-content-center">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <a href="#" class="link-one">

                            </a>
                          </li>
                          <li class="list-inline-item">
                            {{-- <a href="#" class="link-one">
                              <i class="bi bi-twitter" aria-hidden="true"></i>
                            </a> --}}
                          </li>
                          <li class="list-inline-item">
                            {{-- <a href="#" class="link-one">
                              <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a> --}}
                          </li>
                          <li class="list-inline-item">
                            {{-- <a href="#" class="link-one">
                              <i class="bi bi-linkedin" aria-hidden="true"></i>
                            </a> --}}
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <li class="page-item" style="padding: 0.5rem">
                    {{ $agents->links() }}
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Agents Grid-->

  </main><!-- End #main -->
@endsection
