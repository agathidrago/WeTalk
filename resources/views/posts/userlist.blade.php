@extends('layouts.app')

@section('content')

 <div style="text-align: center; display: flex; justify-content: center">
       <div class="col-md-4">
         <form action="{{URL::to('/search')}}" method="get">
           <div class="form-group">
             <input type="search" class="form-control" name="search">
                <span class="form-group-btn">
                    <button type="submit" padding: 10px 20px; font-size: 20px; border-radius: 10px; position:abolute;  right: 20px;
                top: 68px; 
              onclick="window.location.href='/search'" class="btn btn-primary">Search</button>
                </span>
           </div>
         </form>
       </div>
     </div>

     <div class="container">
 
 @if(isset($details)) 
   @foreach($details as $users)
   <div style="text-align: center; display: flex; justify-content: center">
     <table>
         <tr>
           <td> <a href="/profile/{{ $users->id }}">{{ $users->username }} </a></td>
         </tr>
     </table>
    </div>
   @endforeach

   @elseif(isset($message))
    <p>{{ $message }}</p>

  @endif
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

        
 @endsection
