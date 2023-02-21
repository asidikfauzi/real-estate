@extends('header-footer.index')

@section('content')

<main id="main">

    <!-- ======= Contact Single ======= -->
    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                  <h1 class="title-single">EDIT AGENT</h1>
                  <p><a href="{{route('admin.agent.index')}}">Daftar Agent</a></p>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Edit
                    </li>
                  </ol>
                </nav>
              </div>
            <div class="col-sm-12 section-t8">
              <div class="row">
                <div class="col-md-12">
                  <form method="POST" action="{{route('admin.agent.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg form-control-a" placeholder="Email" value="{{$data->email}}" required>
                            </div>
                            @error('email')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="Name" value="{{$data->name}}" required>
                            </div>
                            @error('name')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="no_telp" class="form-control form-control-lg form-control-a" placeholder="Nomor Telephone" value="{{$data->no_telp}}" required>
                            </div>
                            @error('no_telp')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="file" name="image" class="form-control form-control-lg form-control-a" placeholder="Upload Foto">
                            </div>
                            @error('image')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="keterangan" class="form-control" cols="45" rows="8" placeholder="Keterangan" required>{{$data->keterangan}}</textarea>
                            </div>
                            @error('keterangan')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                      <div class="col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-a">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Contact Single-->

</main>
@endsection
