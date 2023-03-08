@extends('header-footer.index')

@section('content')

<style>
    body{
    background:#eee;
}
.chat-list {
    padding: 0;
    font-size: .8rem;
}

.chat-list li {
    margin-bottom: 10px;
    overflow: auto;
    color: #ffffff;
}

.chat-list .chat-img {
    float: left;
    width: 48px;
}

.chat-list .chat-img img {
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    width: 100%;
}

.chat-list .chat-message {
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    background: #5a99ee;
    display: inline-block;
    padding: 10px 20px;
    position: relative;
}

.chat-list .chat-message:before {
    content: "";
    position: absolute;
    top: 15px;
    width: 0;
    height: 0;
}

.chat-list .chat-message h5 {
    margin: 0 0 5px 0;
    font-weight: 600;
    line-height: 100%;
    font-size: .9rem;
}

.chat-list .chat-message p {
    line-height: 18px;
    margin: 0;
    padding: 0;
}

.chat-list .chat-body {
    margin-left: 20px;
    float: left;
    width: 70%;
}

.chat-list .in .chat-message:before {
    left: -12px;
    border-bottom: 20px solid transparent;
    border-right: 20px solid #5a99ee;
}

.chat-list .out .chat-img {
    float: right;
}

.chat-list .out .chat-body {
    float: right;
    margin-right: 20px;
    text-align: right;
}

.chat-list .out .chat-message {
    background: #fc6d4c;
}

.chat-list .out .chat-message:before {
    right: -12px;
    border-bottom: 20px solid transparent;
    border-left: 20px solid #fc6d4c;
}

.card .card-header:first-child {
    -webkit-border-radius: 0.3rem 0.3rem 0 0;
    -moz-border-radius: 0.3rem 0.3rem 0 0;
    border-radius: 0.3rem 0.3rem 0 0;
}
.card .card-header {
    background: #17202b;
    border: 0;
    font-size: 1rem;
    padding: .65rem 1rem;
    position: relative;
    font-weight: 600;
    color: #ffffff;
}

.content{
    margin-top:40px;
}

</style>

<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">MESSAGE</h1>
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
                    <div class="card">
                        <div class="card-header">Message</div>
                        <div class="card-body height3">
                            <ul class="chat-list">
                                @foreach ($data as $item)
                                    @if($item->user_to !== \Auth::user()->id)
                                    <li class="in">
                                        <div class="chat-img">
                                            <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                        </div>
                                        <div class="chat-body">
                                            <div class="chat-message">
                                                <h5>{{$item->email}}</h5>
                                                <p><?= str_replace('\n', '<br>', $item->keterangan) ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    @else
                                    <li class="out">
                                        <div class="chat-img">
                                            <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                                        </div>
                                        <div class="chat-body">
                                            <div class="chat-message">
                                                <h5>{{$item->email}}</h5>
                                                <p><?= str_replace('\n', '<br>', $item->keterangan) ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <textarea name="message" class="form-control" id="message" cols="2" rows="2"></textarea>
                    <button class="form-control mt-2 btn btn-a">Send</button>
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
