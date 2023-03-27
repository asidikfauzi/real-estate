
@extends('header-footer.index')

@section('content')

  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">

        @foreach ($display as $item)
        <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{asset('assets/img/properties/'. $item->image)}})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
              <div class="table-cell">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="intro-body">
                        <p class="intro-title-top">{{$item->keterangan}}
                          <br> {{$item->kode_pos}}
                        </p>
                        <h1 class="intro-title mb-4 ">
                          {{$item->alamat}}
                        </h1>
                        <p class="intro-subtitle intro-price">
                          <a href="#"><span class="price-a">rent | Rp {{number_format($item->harga,3)}}</span></a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Our Services</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-cart"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c"></h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Booking fee hanya Rp.500.000,-
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-card-checklist"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c"></h2>
                </div>
              </div>
              <div class="card-body-c">
                <div class="content-c">
                    <b>GRATIS</b>
                    <ul>
                        <li>BPHTB</li>
                        <li>Biaya Balik Nama</li>
                        <li>Biaya Realisasi</li>
                        <li>Carport</li>
                    </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Latest Properties</h2>
              </div>
              <div class="title-link">
                <a href="{{route('property_grid')}}">All Property
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="property-carousel" class="swiper">
          <div class="swiper-wrapper">

            @foreach ($properties as $item)
            <div class="carousel-item-b swiper-slide">
                <div class="card-box-a card-shadow">
                  <div class="img-box-a" style="height: 300px;">
                    <img src="{{asset('assets/img/properties/'.$item->image)}}" alt="" class="img-a img-fluid">
                  </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="property-single.html">{{$item->alamat}}</a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <div class="price-box d-flex">
                          <span class="price-a">rent | Rp {{number_format($item->harga)}}</span>
                        </div>
                        <a href="#" class="link-a">Click here to view
                          <span class="bi bi-chevron-right"></span>
                        </a>
                      </div>
                      <div class="card-footer-a">
                        <ul class="card-info d-flex justify-content-around">
                          <li>
                            <h4 class="card-info-title">P/L</h4>
                            <span>
                                {{$item->panjang}}m X {{$item->lebar}}m
                            </span>
                          </li>
                          <li>
                            <h4 class="card-info-title">Kamar</h4>
                            <span>{{$item->kamar}}</span>
                          </li>
                          <li>
                            <h4 class="card-info-title">K.Mandi</h4>
                            <span>{{$item->kamar_mandi}}</span>
                          </li>
                          <li>
                            <h4 class="card-info-title">Garasi</h4>
                            <span>{{$item->garasi}}</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End carousel item -->
            @endforeach
          </div>
        </div>
        <div class="propery-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Latest Properties Section -->

    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Best Agents</h2>
              </div>
              <div class="title-link">
                <a href="{{route('agent_grid')}}">All Agents
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            @foreach ($agents as $agent)
            <div class="col-md-4">
                <div class="card-box-d">
                  <div class="card-img-d" style="height: 400px;">
                    <img src="{{asset('assets/img/agent/'. $agent->image)}}" alt="" class="img-d img-fluid" style="width: 100%; height:100%; object-fit: cover;">
                  </div>
                  <div class="card-overlay card-overlay-hover">
                    <div class="card-header-d">
                      <div class="card-title-d align-self-center">
                        <h3 class="title-d">
                          <a href="{{ route('agent_single', $agent->id) }}" class="link-two">{{$agent->name}}</a>
                        </h3>
                      </div>
                    </div>
                    <div class="card-body-d">
                      <p class="content-d color-text-a">
                        {{$agent->keterangan}}
                      </p>
                      <div class="info-agents color-a">
                        <p>
                          <strong>Phone: </strong> {{$agent->no_telp}}
                        </p>
                        <p>
                          <strong>Email: </strong> {{$agent->email}}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </section><!-- End Agents Section -->

  </main><!-- End #main -->

@endsection
