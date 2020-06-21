@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row ">
          <div class="col-8">
              <img src="/storage/{{$post->image}}" class="w-100">
          </div>
        <div class="col-4">
          <div>
              <div class="d-flex align-items-center">
                  <div class="pr-3">
                  
                      <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width:40px;">
                  </div>

                  <div>
                      <div class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                           <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                      </div>
                  </div>

              </div>

              <hr>
              
               <p>  
                   <span class="font-weight-bold">
                      <a href="/profile/{{ $post->user->id }}">
                         <span class="text-dark">{{ $post->user->username }}</span>
                     </a>
                   </span> {{ $post->caption }}
              </p>
              @if(Auth::user()->username ==$post->user->username )
                   <a href="/delete-post/{{$post->id}}"> Delete </a>
               @endif
              

            <like-button post-id="{{$post->id}}" likes="{{ $likes  }}"></like-button>
            <br>
            <div class="pr-5"><strong>{{$post->likedPost->count()}}</strong> Likes</div>
            
              <div>
              <hr />
                    <h4>Display Comments</h4>
                    @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" oninvalid="setCustomValidity('Please write your comment')" required />
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
                    </form>
              </div>
            </div>
        </div>
    </div>
    <hr>
    <div>
    <button type="button" style=" padding: 10px 15px; font-size: 20px; background-color:#80ced6;border-radius: 10px; position: absolute; left: 0;"   
            onclick="window.location.href='/'"> Home </button>
         <button type="button" style=" padding: 10px 15px; font-size: 20px; background-color:#80ced6; border-radius: 10px; position:relative; top:50%; left:20%;"   
            onclick="window.location.href='/search'"> Search </button>
         <button type="button" style=" padding: 10px 15px; background-color: #4CAF50; position:relative; top:50%;  left:50%; font-size: 20px; border-radius: 10px;"  
            onclick="window.location.href='/p/create'"> Add a post </button>
        <button type="button" style=" padding: 10px 15px; font-size: 20px; background-color:#80ced6; border-radius: 10px;position: absolute; right: 0;"
            onclick="window.location.href='/profile/{{ Auth::user()->id }}'"> Profile </button>
    </div>

</div>
@endsection
