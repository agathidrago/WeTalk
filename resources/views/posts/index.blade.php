@extends('layouts.app')

@section('content')
 <div class="container">
  
      @if(isset($details)) 
        @foreach($details as $users)
          <table>
              <tr>
                <td>{{ $users->username }}</td>
                <td>{{ $users->id }}</td>
              </tr>
          </table>
        @endforeach
       @endif

      
       
    @foreach($posts  as $post)    
     <div class="row ">
          <div class="col-6 offset-4">
              <a href="/profile/{{ $post->user->id}}">
                <img src="/storage/{{$post->image}}" class="w-100">
              </a>
          </div>
      </div>    
      <div class="row pt-2 pb-4">
        <div class="col-6 offset-4">
          <div>          
               <p>  
                   <span class="font-weight-bold">
                      <a href="/profile/{{ $post->user->id }}">
                         <span class="text-dark">{{ $post->user->username }}</span>
                     </a>
                   </span> {{ $post->caption }}
              </p>
 
            </div>
        </div>
    </div>
    
@endforeach
<div>
<stream-chat :autheduser="{{ Auth::user() }}" ></stream-chat>
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
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        </div>
@endsection
