@extends('layouts.app')

@section('content')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update a  reply</div>

                <div class="card-body">
                   
                  <form action="{{ route('reply.update', ['id' => $reply->id ]) }}" method="post">

                    {{ csrf_field() }}

                <div class="form-group">

                  <label for="content"> Answer a Question</label>

                  <textarea name="content"  id="content" cols="30" rows="10" class="form-control">{{ $reply->content }}</textarea>

                </div>

                <div class="form-group">
                
                    <button class="btn btn-success pull-right"  type="submit">Save reply changes</button>

                </div>
            </div>
        </div>
        </div>
   
@endsection
