@extends('header-footer.index')

@section('content')

<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">DAFTAR PROPERTY</h1>
                <p><a href="{{route('admin.create')}}">Tambah Property</a></p>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Daftar
                  </li>
                </ol>
              </nav>
            </div>
            <div class="col-sm-12 section-t8">
                <div class="row">
                  <div class="col-md-12">
                    <form method="POST" action="{{route('admin.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                          <table id="table-document" class="display table-document stripe row-border order-column" style="width: 100%;" >
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Image</th>
                                      <th>Lebar</th>
                                      <th>Panjang</th>
                                      <th>Alamat</th>
                                      <th>Harga</th>
                                      <th>Keterangan</th>
                                      <th>Status</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr></tr>
                              </tbody>
                          </table>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </section><!-- End Intro Single-->

    <!-- ======= Contact Single ======= -->
    <section class="contact">
        <div class="container">
          <div class="row">

          </div>
        </div>
      </section><!-- End Contact Single-->

</main>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



<script type="text/javascript">
console.log('masok')
    $(document).ready(function(){

        fetch_data();


        function fetch_data()
        {
            $('.table-document').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sEmptyTable:   'Tidak ada data yang tersedia pada tabel ini',
                    sProcessing:   'Sedang memproses...',
                    sZeroRecords:  'Tidak ditemukan data yang sesuai',
                    sInfo:         'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
                    sInfoEmpty:    'Menampilkan 0 sampai 0 dari 0 entri',
                    sInfoFiltered: '(disaring dari _MAX_ entri keseluruhan)',
                    sInfoPostFix:  '',
                    sSearch:       '',
                    sUrl:          '',
                    oPaginate: {
                    sFirst:    'Pertama',
                    sPrevious: 'Sebelumnya',
                    sNext:     'Selanjutnya',
                    sLast:     'Terakhir'
                    }
                },
                paging: false,
                responsive: true,
                // scrollY:"300px",
                scrollX: true,
                filter : true,
                lengthChange: false,
                scrollCollapse: true,
                fixedColumns:   {
                    heightMatch: 'none'
                },
                ajax: {
                    url:"{{ route('admin.getdata.properties') }}",
                },
                columns:[
                        {data: 'id',
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {data: 'image',
                            render: function(data){
                                return `<img src="{{asset('assets/img/properties/`+data+`')}}" style="width:200px; height:130px;"/>`
                            }
                        },
                        {data: 'lebar', name: 'lebar'},
                        {data: 'panjang', name: 'panjang'},
                        {data: 'alamat', name: 'alamat'},
                        {data: 'harga',
                            render: $.fn.dataTable.render.number( ',', '.', 3, 'Rp.' )
                        },
                        {data: 'keterangan', name: 'keterangan'},
                        {data: 'status',
                            render: function(data) {
                                if(data == 1) {
                                    return 'Tersedia'
                                } else {
                                    return 'terjual'
                                }
                            }
                        },
                        {data: 'edit', name: 'edit'},
                        {data: 'delete', name: 'delete'}
                ]
            });
        }
    });
</script>
