@extends('header-footer.index')

@section('content')


<main class="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container p-0">
            <h1 class="h3 mb-3">Messages</h1>
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-lg-12 col-xl-12">
                        <div class="py-2 px-4 border-bottom d-none d-lg-block">
                            <div class="d-flex align-items-center py-1">
                                <div class="position-relative">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                </div>
                                <div class="flex-grow-1 pl-3">
                                    <strong>&nbsp;Admin</strong>
                                </div>

                            </div>
                        </div>

                        <div class="position-relative">

                            <div class="chat-messages p-4">
                                @foreach ($data as $item)
                                @if($item->user_to === \Auth::user()->id)
                                <div class="chat-message-left pb-4">
                                    <div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                        <div class="font-weight-bold mb-1">{{$item->email}}</div>
                                        <?= str_replace('\n', '<br>', $item->keterangan) ?>
                                        <div class="text-muted small text-nowrap mt-2">{{$item->created_at->format('l, H:i')}}</div>
                                    </div>
                                </div>
                                @else
                                <div class="chat-message-right pb-4">
                                    <div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                        <div class="font-weight-bold mb-1">You</div>
                                        <?= str_replace('\n', '<br>', $item->keterangan) ?>
                                        @if($item->image != null)
                                            <a href="{{asset('assets/img/message/'. $item->image)}}" target="_blank">
                                                <img src="{{asset('assets/img/message/'. $item->image)}}" alt="image pesan" style="height: 100px">
                                            </a>
                                        @endif
                                        <div class="text-muted small text-nowrap mt-2">{{$item->created_at->format('l, H:i')}}</div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <form method='post' action="{{route('user.sendPesan')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="flex-grow-0 py-3 px-4 border-top">
                                <div class="input-group">
                                    <input type="file" name="image" style="width: 20%">
                                    <input type="text" class="form-control" name="isi_pesan" placeholder="Type your message">
                                    <button class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
