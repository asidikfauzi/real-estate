@extends('header-footer.index')

@section('content')
<main class="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container p-0">
            <h1 class="h3 mb-3">Messages</h1>
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-3 border-right">
                        <div class="px-4 d-none d-md-block">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control my-3" placeholder="Search...">
                                </div>
                            </div>
                        </div>
                        @foreach ($data as $item)
                        <div class="px-4 d-none d-md-block mt-1">
                            <a href="#" id="user_id" data-id="{{$item->user_from}}" class="list-group-item list-group-item-action border-0 user_id">
                                <div class="d-flex align-items-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                    <div class="flex-grow-1 ml-3">
                                        {{$item->email}}
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        <hr class="d-block d-lg-none mt-1 mb-0">
                    </div>
                    <div class="col-12 col-lg-7 col-xl-9">

                                <div id="chat-messages-container-first"></div>
                                <div id="chat-messages-container"></div>
                                <div id="chat-messages-container-last"></div>

                                <div id="chat-messages-container-send"></div>



                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@auth
<script type="text/javascript">
$(document).ready(function() {

    $('.user_id').click(function(event) {
        var id = $(this).data('id');

        $("#chat-messages-container-first").empty();
        $("#chat-messages-container").empty();
        $("#chat-messages-container-last").empty();
        $("#chat-messages-container-send").empty();
        event.preventDefault();
        var user = {!! auth()->user()->toJson() !!};

        $.ajax({
            url: `/admin/pesan/${id}`,
            type: "GET",
            dataType: "json",
            success: function(response) {

                var email = ``;
                var id_user = '';
                if(response[0].user_to == user.id) {
                    email = response[0].email
                    id_user = response[0].user_from
                }

                $.each(response.slice(0, 1), function(index, value){
                    var firstMessagesContainer = $("#chat-messages-container-first");
                    var firstMessage = `
                        <div class="py-2 px-4 border-bottom d-none d-lg-block">
                            <div class="d-flex align-items-center py-1">
                                <div class="position-relative">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                </div>
                                <div class="flex-grow-1 pl-3">
                                    <strong>&nbsp;${value.email}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative" style="max-height: 500px; overflow:scroll;">
                            <div class="chat-messages p-4">`
                    firstMessagesContainer.append(firstMessage);
                })

                var chatMessagesContainer = $("#chat-messages-container");

                $.each(response, function(index, message) {
                    var message1 = ``;
                    var keterangan = message.keterangan
                    var keteranganMessage = keterangan.replace(/\n/g, "<br>")
                    var date = new Date(message.created_at);
                    var formattedDate = date.toLocaleString('en-US', {weekday: 'short', day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', hour12: false}).replace(",", "").replace(/:\d{2}\s/, " ");
                    if(message.user_from == user.id) {
                        message1 += `
                            <div class="chat-message-right pb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                    <div class="font-weight-bold mb-1">You</div>
                                    <p>${keteranganMessage}</p>`;
                                    if(message.image != "" && message.image != null) {
                                        var imageUrl = `{{ asset('assets/img/message/') }}/`+message.image;
                                        message1 += `
                                        <a href="${imageUrl}" target="_blank">
                                            <img src="${imageUrl}" alt="image pesan" style="height: 100px">
                                        </a>`
                                }
                        message1 += `
                                    <div class="text-muted small text-nowrap mt-2">${formattedDate}</div>
                                </div>
                            </div>`
                    } else {
                        message1 += `
                        <div class="chat-message-left pb-4">
                            <div>
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                            </div>
                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                <div class="font-weight-bold mb-1">${message.email}</div>
                                <p>${keteranganMessage}</p>`;
                                if(message.image != "" && message.image != null) {
                                    var imageUrl = `{{ asset('assets/img/message/') }}/`+message.image;
                                    message1 += `
                                    <a href="${imageUrl}" target="_blank">
                                        <img src="${imageUrl}" alt="image pesan" style="height: 100px">
                                    </a>`
                                }
                        message1 += `
                                <div class="text-muted small text-nowrap mt-2">${formattedDate}</div>
                            </div>
                        </div>`
                    }

                    chatMessagesContainer.append( message1 );
                });


                $.each(response.slice(0, 1), function(index, value){
                    var lastMessagesContainer = $("#chat-messages-container-last");
                    var lastMessage = `
                            </div>
                        </div>`
                    lastMessagesContainer.append(lastMessage)
                    // console.log(value); // output: data1
                    var formAction = `{{ route('admin.sendPesan') }}`
                    var sendMessageContainer = $("#chat-messages-container-send");
                    var sendMessage = `
                        <form method='post' action="${formAction}" enctype="multipart/form-data">
                            @csrf
                            <div class="flex-grow-0 py-3 px-4 border-top">
                                <div class="input-group">
                                    <input type="text" name="id_user" id="" value="${value.user_from}" hidden>
                                    <input type="file" name="image" style="width: 25%">
                                    <input type="text" class="form-control" name="isi_pesan" placeholder="Type your message">
                                    <button class="btn btn-primary" id="send">Send</button>
                                </div>
                            </div>
                        </form>
                    `
                    sendMessageContainer.append(sendMessage)
                });
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }

        });
    });
});

</script>
@endauth
