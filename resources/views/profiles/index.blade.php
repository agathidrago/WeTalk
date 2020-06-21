@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
    <!--col-3 sa kolona do kete ne dispozicion fotografia -->
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}"  class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
             <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                   <div class="h4"> 
                       {{$user->username}} 

                   </div> 
                   @if(Auth::user()->username !==$user->username )
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endif
               </div>
               </div>
               
               @if(Auth::user()->username ==$user->username )
                 <div style=" position: absolute; right: 0;">
                    @can('update', $user->profile)
                  
                     <a href="/p/create">Add New Post</a>
                     <br> 
                    @endcan
                 </div>
             
                    <a href="/password/reset"> Edit Password</a>
                     <br>
                    

                      @can('update', $user->profile)
                         <a href=" /profile/{{ $user->id }}/edit"> Edit Profile</a>
                         <br>
                       @endcan
                       <br>
              @endif
                
            

             
             <div class="d-flex"> <!--per te vendosur div-et e meposhtme ne te njejtin rresht dhe jo njeri-pas tjetrit-->
             <!-- pr-5 hapesira midis diveve te meposhtem -->
             <div class="pr-5"><strong> {{ $postCount }} </strong> posts </div>
             <div class="pr-5"> <strong> {{ $followersCount }} </strong> followers </div>
             <div class="pr-5"> <strong> {{  $followingCount }} </strong> following </div> 
             </div>
             <div class="pt-4 font-weight-bold"> {{$user->profile->title}} </div>
             <div> {{$user->profile->description}} </div>
             <div><a href="{{$user->profile->url}}">{{$user->profile->url}} </a> </div>
        </div>
        
    </div>
    <div class="row pt-5">

     @foreach($user->posts as $post)

     <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
            <img src="/storage/{{ $post->image }}"  class="w-100">    
            </a>       
        </div>
     @endforeach

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
