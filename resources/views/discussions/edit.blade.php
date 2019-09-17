@extends('layouts.app')

@section('content')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update a  discussion</div>

                <div class="card-body">
                   
                  <form action="{{ route('discussion.update', ['id' => $discussion->id]) }}" method="post">

                    {{ csrf_field() }}

                <div class="form-group">

                  <label for="content"> Ask a Question</label>

                  <textarea name="content"  id="content" cols="30" rows="10" class="form-control">{{ $discussion->content }}</textarea>

                </div>

                <div class="form-group">
                
                    <button class="btn btn-success pull-right"  type="submit">Update discussion</button>

                </div>
            </div>
        </div>
        </div>
   
@endsection
