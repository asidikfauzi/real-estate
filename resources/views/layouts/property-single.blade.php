@extends('header-footer.index')

@section('content')

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">{{$properties->alamat}}</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{route('property_grid')}}">Properties</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  {{$properties->alamat}}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div id="property-single-carousel" class="swiper">
              <div class="swiper-wrapper">
                <div class="carousel-item-b swiper-slide">
                  <img src="assets/img/slide-1.jpg" alt="">
                </div>
                <div class="carousel-item-b swiper-slide">
                  <img src="assets/img/slide-2.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="property-single-carousel-pagination carousel-pagination"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">

            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="bi bi-cash">Rp.</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c">{{number_format($properties->harga,2)}}</h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Property ID:</strong>
                        <span>{{substr($properties->id, 0,5)}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Location:</strong>
                        <span>{{$properties->alamat}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Property Type:</strong>
                        <span>House</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Status:</strong>
                        <span>Sale</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Area:</strong>
                        <span>{{$properties->panjang}}m
                          <sup>2</sup>
                          x
                          {{$properties->lebar}}m
                            <sup>2</sup>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Beds:</strong>
                        <span>{{$properties->kamar}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Baths:</strong>
                        <span>{{$properties->kamar_mandi}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Garage:</strong>
                        <span>{{$properties->garasi}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Pondasi:</strong>
                        <span>{{$properties->pondasi}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Struktur:</strong>
                        <span>{{$properties->struktur}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Atap:</strong>
                        <span>{{$properties->atap}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Dinding:</strong>
                        <span>{{$properties->dinding}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Platon:</strong>
                        <span>{{$properties->platon}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Lantai:</strong>
                        <span>{{$properties->lantai}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Kusen:</strong>
                        <span>{{$properties->kusen}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Pintu:</strong>
                        <span>{{$properties->pintu}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Sanitasi:</strong>
                        <span>{{$properties->sanitasi}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Air:</strong>
                        <span>{{$properties->air}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Listrik:</strong>
                        <span>{{$properties->listrik}}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    {{$properties->keterangan}}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-10 offset-md-1">
            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-video-tab" data-bs-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Image</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                <img src="{{asset('assets/img/properties/'. $properties->image)}}" width="100%" height="460" frameborder="0" >
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Contact Agent</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <img src="assets/img/agent-4.jpg" alt="" class="img-fluid">
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="property-agent">
                  <h4 class="title-agent">Anabella Geller</h4>
                  <p class="color-text-a">
                    Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet
                    dui. Quisque velit nisi,
                    pretium ut lacinia in, elementum id enim.
                  </p>
                  <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                      <strong>Phone:</strong>
                      <span class="color-text-a">(222) 4568932</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Mobile:</strong>
                      <span class="color-text-a">777 287 378 737</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Email:</strong>
                      <span class="color-text-a">annabella@example.com</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Skype:</strong>
                      <span class="color-text-a">Annabela.ge</span>
                    </li>
                  </ul>
                  <div class="socials-a">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="property-contact">
                  <form class="form-a">
                    <div class="row">
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-a">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->
@endsection
