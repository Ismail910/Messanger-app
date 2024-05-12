<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>chat app - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
.gradient-custom {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to bottom right, rgba(252, 203, 144, 1), rgba(213, 126, 235, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to bottom right, rgba(252, 203, 144, 1), rgba(213, 126, 235, 1))
}

.mask-custom {
background: rgba(24, 24, 16, .2);
border-radius: 2em;
backdrop-filter: blur(15px);
border: 2px solid rgba(255, 255, 255, 0.05);
background-clip: padding-box;
box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
}
    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<section class="gradient-custom">
  <div class="container py-5">

    <div class="row">

      <div class="col-md-6 col-lg-5 col-xl-5 mb-4 mb-md-0">

        <h5 class="font-weight-bold mb-3 text-center text-white">Member</h5>

        <div class="card mask-custom">
          <div class="card-body">

           
            <ul class="list-unstyled mb-0">
              
                @foreach($chats as $chat)
                    <li class="p-2 border-bottom" style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                        <a href="{{route('home',$chat->id)}}" class="d-flex justify-content-between link-light">
                        <div class="d-flex flex-row">
                            <img src="" alt="avatar"
                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                            <div class="pt-1">
                            <p class="fw-bold mb-0">{{$chat->participants[0]->name}}</p>
                            <p class="fw-bold mb-0">{{$chat->lastMessage->created_at->diffForHumans()}}</p>
                            <p class="small text-white">{{Str::words( $chat->lastMessage->body ,5)}}</p>
                            </div>
                        </div>
                        <div class="pt-1">
                            <p class="small text-white mb-1">Just now</p>
                            <span class="badge bg-danger float-end">1</span>
                        </div>
                        </a>
                    </li>
                @endforeach
            </ul>

          </div>
        </div>

      </div>

      <div class="col-md-6 col-lg-7 col-xl-7">

        <ul class="list-unstyled text-white">
        @foreach($messages as $message)
            <li class="d-flex justify-content-between mb-4">
                @if ($message->user_id == Auth::id())
                    <img src="{{$message->user->avatar_url}}" alt="avatar"
                    class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                @endif
               
                <div class="card mask-custom">
                <div class="card-header d-flex justify-content-between p-3"
                    style="border-bottom: 1px solid rgba(255,255,255,.3);">
                    <p class="fw-bold mb-0">{{$message->user->name}}t</p>
                    <p class="text-light small mb-0"><i class="far fa-clock"></i> {{$message->created_at->diffForHumans()}}</p>
                </div>
                <div class="card-body">
                    <p class="mb-0">
                   {{$message->body}}
                    </p>
                </div>
                </div>
                @if ($message->user_id != Auth::id())
                    <img src="{{$message->user->avatar_url}}" alt="avatar"
                    class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                @endif
            </li>
            @endforeach
          <li class="mb-3">
            <div data-mdb-input-init class="form-outline form-white">
              <textarea class="form-control" id="textAreaExample3" rows="4"></textarea>
              <label class="form-label" for="textAreaExample3">Message</label>
            </div>
          </li>
          <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg btn-rounded float-end">Send</button>
        </ul>

      </div>

    </div>

  </div>
</section>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>


