<!doctype html>
<html lang="en">
<head>
    <title>Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            background: #7F7FD5;
            background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
            background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        }

        .chat {
            margin-top: auto;
            margin-bottom: auto;
        }

        .card {
            height: 500px;
            border-radius: 15px !important;
            background-color: rgba(0, 0, 0, 0.4) !important;
        }

        .contacts_body {
            padding: 0.75rem 0 !important;
            overflow-y: auto;
            white-space: nowrap;
        }

        .msg_card_body {
            overflow-y: auto;
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
            border-bottom: 0 !important;
        }

        .card-footer {
            border-radius: 0 0 15px 15px !important;
            border-top: 0 !important;
        }


        .search {
            border-radius: 15px 0 0 15px !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
        }

        .search:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .type_msg {
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            height: 60px !important;
            overflow-y: auto;
        }

        .type_msg:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .attach_btn {
            border-radius: 15px 0 0 15px !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .search_btn {
            border-radius: 0 15px 15px 0 !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .contacts {
            list-style: none;
            padding: 0;
        }

        .contacts li {
            width: 100% !important;
            padding: 5px 10px;
            margin-bottom: 15px !important;
        }

        .active {
            background-color: rgba(0, 0, 0, 0.3);
        }

        .user_img {
            height: 70px;
            width: 70px;
            border: 1.5px solid #f5f6fa;

        }

        .user_img_msg {
            height: 40px;
            width: 40px;
            border: 1.5px solid #f5f6fa;

        }

        .img_cont {
            position: relative;
            height: 70px;
            width: 70px;
        }

        .img_cont_msg {
            height: 40px;
            width: 40px;
        }

        .online_icon {
            position: absolute;
            height: 15px;
            width: 15px;
            background-color: #4cd137;
            border-radius: 50%;
            bottom: 0.2em;
            right: 0.4em;
            border: 1.5px solid white;
        }

        .user_info {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 15px;
        }

        .user_info span {
            font-size: 20px;
            color: white;
        }

        .user_info p {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.6);
        }

        .video_cam span {
            color: white;
            font-size: 20px;
            cursor: pointer;
            margin-right: 20px;
        }

        .msg_container {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 10px;
            border-radius: 25px;
            background-color: #82ccdd;
            padding: 10px;
            position: relative;
        }

        .msg_container_send {
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 10px;
            border-radius: 25px;
            background-color: #78e08f;
            padding: 10px;
            position: relative;
        }

    </style>
</head>
<body>
<a href="{{ route('logout') }}">
    <button type="button" class="btn btn-danger">Log out</button>
</a>
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-4 col-xl-3 chat">
            <div class="card mb-sm-3 mb-md-0 contacts_card">
                <div class="card-header">
                    <div class="input-group">
                        <input type="text" placeholder="Search..." name="" class="form-control search">
                        <div class="input-group-prepend">
                            <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card-body contacts_body">
                    @foreach($users as $user)
                        <ui class="contacts">
                            <li class="active">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
                                             class="rounded-circle user_img">
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <a href="{{ route('chatMessage', $user->id) }}">{{$user->name}}</a>
                                        <p>is online</p>
                                    </div>
                                </div>
                            </li>
                        </ui>
                    @endforeach
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-md-8 col-xl-6 chat">
            <div class="card">
                <div class="card-header msg_head">
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
                                 class="rounded-circle user_img">
                            <span class="online_icon"></span>
                        </div>
                        @if($user_id)
                            <div class="user_info">
                                <span>Chat with {{$user_id->name}}</span>
                            </div>
                            @else
                            <div class="user_info">
                                <span>Chat with....</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body msg_card_body">
                    @foreach($messages as $message)
                        @if($message->sender_id==$user_id->id && $message->recipient_id==Auth::user()->id)
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img alt="Bruce Lee 1973.jpg" class="rounded-circle user_img_msg"
                                         src="//upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Bruce_Lee_1973.jpg/250px-Bruce_Lee_1973.jpg"
                                         decoding="async" width="250" height="334"
                                         srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Bruce_Lee_1973.jpg/375px-Bruce_Lee_1973.jpg 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Bruce_Lee_1973.jpg/500px-Bruce_Lee_1973.jpg 2x">
                                </div>
                                <div class="msg_container">
                                    {{$message->message}}
                                </div>
                            </div>
                        @endif
                        @if($message->recipient_id==$user_id->id && $message->sender_id==Auth::user()->id)
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_container_send">
                                    {{$message->message}}
                                </div>
                                <div class="img_cont_msg">
                                    <img alt="Ип Ман, патриарх Вин-Чун" class="rounded-circle user_img_msg"
                                         src="//upload.wikimedia.org/wikipedia/commons/6/6c/Yip_Man.jpg"
                                         decoding="async" width="250" height="369" data-file-width="250"
                                         data-file-height="369">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <form action="{{ route('createMessage', $user_id->id) }}" method="POST">
                    @csrf
                    <div class="card-footer">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                            </div>
                            <label for="text"></label>
                            <textarea name="message" id="text" class="form-control type_msg"
                                      placeholder="Type your message..."></textarea>
                            <button class="btn btn-warning" type="submit" id="button-addon2"
                                    style="padding-top: .55rem;">
                                Відправити
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

