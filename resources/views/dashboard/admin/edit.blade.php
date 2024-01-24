@extends('header-footer.index')

@section('content')

<main id="main">

    <!-- ======= Contact Single ======= -->
    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                  <h1 class="title-single">EDIT PROPERTY</h1>
                  <p><a href="{{route('admin.index')}}">Daftar Property</a></p>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{route('index')}}">Home</a>
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
                  <form method="POST" action="{{route('admin.update',$data->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <div class="form-group">
                                <input type="text" name="alamat" class="form-control form-control-lg form-control-a" placeholder="Alamat" value="{{$data->alamat}}" required>
                            </div>
                            @error('alamat')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <input type="number" name="kode_pos" class="form-control form-control-lg form-control-a" placeholder="Kode Pos" value="{{$data->kode_pos}}" required>
                            </div>
                            @error('kode_pos')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="number" name="panjang" class="form-control form-control-lg form-control-a" placeholder="Panjang" value="{{$data->panjang}}" required>
                            </div>
                            @error('panjang')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="number" name="lebar" class="form-control form-control-lg form-control-a" placeholder="Lebar" value="{{$data->lebar}}" required>
                            </div>
                            @error('lebar')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="number" name="kamar" class="form-control form-control-lg form-control-a" placeholder="Jumlah Kamar" value="{{$data->kamar}}" required>
                            </div>
                            @error('kamar')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="number" name="kamar_mandi" class="form-control form-control-lg form-control-a" placeholder="Jumlah Kamar Mandi" value="{{$data->kamar_mandi}}" required>
                            </div>
                            @error('kamar_mandi')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="number" name="garasi" class="form-control form-control-lg form-control-a" placeholder="Jumlah Garasi" value="{{$data->garasi}}" required>
                            </div>
                            @error('garasi')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="pondasi" class="form-control form-control-lg form-control-a" placeholder="Pondasi" value="{{$data->pondasi}}" required>
                            </div>
                            @error('pondasi')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="struktur" class="form-control form-control-lg form-control-a" value="{{$data->struktur}}" placeholder="Struktur" required>
                            </div>
                            @error('struktur')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="atap" class="form-control form-control-lg form-control-a" value="{{$data->atap}}" placeholder="Atap" required>
                            </div>
                            @error('atap')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="dinding" class="form-control form-control-lg form-control-a" value="{{$data->dinding}}" placeholder="Dinding" required>
                            </div>
                            @error('dinding')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="platon" class="form-control form-control-lg form-control-a" placeholder="Platon" value="{{$data->platon}}" required>
                            </div>
                            @error('platon')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="lantai" class="form-control form-control-lg form-control-a" placeholder="Lantai" value="{{$data->lantai}}" required>
                            </div>
                            @error('lantai')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="kusen" class="form-control form-control-lg form-control-a" placeholder="Kusen" value="{{$data->kusen}}" required>
                            </div>
                            @error('kusen')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="pintu" class="form-control form-control-lg form-control-a" placeholder="Pintu" value="{{$data->pintu}}" required>
                            </div>
                            @error('pintu')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="sanitasi" class="form-control form-control-lg form-control-a" placeholder="Sanitasi" value="{{$data->sanitasi}}" required>
                            </div>
                            @error('sanitasi')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="air" class="form-control form-control-lg form-control-a" placeholder="Air" value="{{$data->air}}" required>
                            </div>
                            @error('air')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="listrik" class="form-control form-control-lg form-control-a" placeholder="Listrik" value="{{$data->listrik}}" required>
                            </div>
                            @error('listrik')
                                <div style="font-size: 12px; color: red">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="number" name="harga" class="form-control form-control-lg form-control-a" placeholder="Rp. 10.000" value="{{$data->harga}}" required>
                            </div>
                            @error('harga')
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
