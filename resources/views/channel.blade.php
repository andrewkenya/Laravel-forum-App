@extends('layouts.app')

@section('content')


    @foreach($discussions as $d)

             <div class="card">

                <div class="card-header">

               <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
               
               <span>{{ $d->user->name }}, <b>{{ $d->created_at->diffForHumans() }}</span>

               <a href="{{ route('discussion', ['slug' => $d->slug ]) }}" class="btn btn-primary float-right btn-sm mx-2">view</a>

               @if($d->hasBestAnswer())

               <span class="btn btn float-right btn-success btn-sm mx-2">Closed</span>

               @else

               <span class="btn btn float-right btn-danger btn-sm mx-2">Open</span>
            
               @endif


            </div>

            <div class="card-body">
               
                <h5 class="text-center">

                    {{ $d->title }}

                </h5>

                <p class="text-center">

                {{ str_limit($d->content, 50)  }}

            </p>
            </div>

            <div class="card-footer">
             <p>
                 {{ $d->replies->count() }} Replies
             </p>
               
             <a href="{{ route('channel', ['slug'=> $d->channel->slug ]) }}" class=" float-right  badge badge-success">{{$d->channel->title }}</a>
             
            </div>

             </div>
   
         @endforeach

         <div class="text-center">

             

         </div>

@endsection
