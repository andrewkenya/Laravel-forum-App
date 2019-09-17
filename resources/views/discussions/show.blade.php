@extends('layouts.app')

@section('content')

           
<div class="card">

    <div class="card-header">

   <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
   
   <span>{{ $d->user->name }}, <b>( {{ $d->user->points }} )</b></span>
     
   @if($d->hasBestAnswer())

   <span class="btn btn float-right btn-success btn-sm mx-2" style="margin:3px">Closed</span>

   @else

   <span class="btn btn float-right btn-danger btn-sm mx-2" style="margin:3px">Open</span>

   @endif

   @if(Auth::id() == $d->user->id)
       
        @if(!$d->hasBestAnswer())
        <a href="{{ route('discussion.edit', ['slug' => $d->slug ]) }}" class="btn btn-info btn-sm float-sm-right" style="margin:3px">Edit</a>

        @endif

   @endif
   
   

    @if($d->is_being_watched_by_auth_user())

   <a href="{{ route('discussion.unwatch', ['id' => $d->id ]) }}" class="btn btn-primary btn-sm float-sm-right" style="margin:3px">Unwatch</a>

   @else 

   <a href="{{ route('discussion.watch', ['id' => $d->id ]) }}" class="btn btn-primary btn-sm float-sm-right" style="margin:3px">Watch</a>

   @endif

</div>

<div class="card-body">
   
    <h5 class="text-center">

        {{ $d->title }}

    </h5>

    <hr>

    <p class="text-center">

    
        {!! \Michelf\Markdown::defaultTransform($d->content) !!} 
   
</p>

<hr>

@if($best_answer) 

    <div class="text-center px-40px" >
        <h3 class="text-center">Best Answer</h3>

            <div class="card-header bg-success">

                    <img src="{{ $best_answer->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;
                    <span>{{ $best_answer->user->name }}<b>( {{ $best_answer->user->points }} )</b> </span>
        </div>

        <div class="card-body">

               {{ $best_answer->content }}
        </div>
    </div>

    @endif


    

</div>

<div class="card-footer">
 <p>
     {{ $d->replies->count() }} Replies
 </p>

 <a href="{{ route('channel', ['slug'=> $d->channel->slug ]) }}" class=" float-right  badge badge-success">{{$d->channel->title }}</a>

</div>

 </div>
   

 @foreach($d->replies as $r)


 <div class="card">

    <div class="card-header">

   <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
   
   <span>{{ $r->user->name }}, <b>( {{ $r->user->points }} )</b></span>

    @if(!$best_answer)

        @if(Auth::id() == $d->user->id)

        <a href="{{ route('discussion.best.answer', ['id' => $r->id ]) }}" class="btn btn-xs btn-primary float-right" style="margin-left:3px">Mark as best answer</a>


        @endif
    @endif


    @if(Auth::id() == $r->user->id)

       @if(!$r->best_answer)

       <a href="{{ route('reply.edit', ['id' => $r->id ]) }}" class="btn btn-info btn-sm float-sm-right" style="margin:3px">Edit</a>

           
       @endif

    @endif
</div>

<div class="card-body">

    <p class="text-center">

    {{ ($r->content)  }}

</p>
</div>

<div class="card-footer">
  
    @if($r->is_liked_by_auth_user())

       <a href=" {{ route('reply.unlike', ['id' => $r->id]) }}" class="btn btn-danger btn-xs">Unlike  <span class="badge">{{ $r->likes->count() }}</a>

    @else

    <a href=" {{ route('reply.like', ['id' => $r->id ]) }}" class="btn btn-success btn-xs">Like <span class="badge">{{ $r->likes->count() }}</a>

    @endif

</div>

 </div>
   


 @endforeach


 <div class="card">
     <div class="card-body">

         @if(Auth::check())

         <form action ="{{ route('discussion.reply', ['id'=> $d->id ]) }}"
                method="POST">
   
                {{ csrf_field() }}
   
                <div class="form-group">
   
                   <label for="reply">Leave a reply... </label>
   
                   <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
   
                </div>
   
                <div class="form-group">
   
                   <button class="btn btn-secondary float-right">Leave a reply</button>
                </div>
               </form>

         @else
             <div class="text-center">
                 <h2>Sign in to leave a reply</h2>
             </div>

         @endif



     </div>
 </div>
    

@endsection
