@extends('header-footer.index')

@section('content')
  <main id="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">Grid Properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Properties Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                <select class="custom-select">
                  <option selected>All</option>
                  <option value="1">New to Old</option>
                  <option value="2">For Rent</option>
                  <option value="3">For Sale</option>
                </select>
              </form>
            </div>
          </div>
          @foreach ($properties as $item)
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a" style="height: 450px">
                <img src="{{asset('assets/img/properties/'.$item->image)}}" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">{{$item->alamat}}</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | Rp {{number_format($item->harga)}}</span>
                    </div>
                    <a href="{{route('property_single', $item->id)}}" class="link-a">Click here to view
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">PxL</h4>
                        <span>
                            {{$item->panjang}}m x {{$item->lebar}}m
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Kamar</h4>
                        <span>{{$item->kamar}}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">K. Mandi</h4>
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
          </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="pagination-a">
              <div class="pagination justify-content-end">
                <div class="page-item">
                    {{ $properties->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->

@endsection
