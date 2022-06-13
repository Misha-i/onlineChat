<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Messages</title>

    <style>

        /*.blog {
            overflow: auto;
        }*/
        .message-container {
            overflow: auto;
            height: 300px;
        }

        .message-left {
            /*text-align: left;*/
            background-color: #75d59f;
            margin: 10px 10px;
        }

        .message-right {
            /*text-align: right;*/
            background-color: #70517c;
            margin: 10px 10px;
        }

    </style>
</head>
<body>
<a href="{{ route('logout') }}">
    <button type="button" class="btn btn-danger">Вийти</button>
</a>
<p>{{ auth()->user()->name }}</p>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center p-3"
                         style="border-top: 4px solid #ffa900;">
                        <h5 class="mb-0">Chat messages</h5>
                    </div>
                    <div class="message-container">
                        @foreach($messages as $message)
                            @if($message->sender_id==1 && $message->recipient_id==2)
                                <div class="message-left">
                                    <p style="text-align: left">{{ $message->message }}</p>
                                </div>
                            @endif
                            @if($message->sender_id==2 && $message->recipient_id==1 )
                                <div class="message-right">
                                    <p style="text-align: right">{{ $message->message }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @php
                        dump(auth()->check())
                    @endphp

                    <form action="{{ route('createMessage') }}" method="POST">
                        @csrf
                        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Type message"
                                       aria-label="Recipient's username" aria-describedby="button-addon2"/>
                                <button class="btn btn-warning" type="submit" name="message" id="button-addon2"
                                        style="padding-top: .55rem;">
                                    Button
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

