@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   
                 
                    <table class="table table-hover">
                      
                        <thead>
                              
                            <th>Name</th>

                            <th>Edit</th>

                            <th>Delete</th>

                        </thead>
                        <tbody>
                            @foreach($channels as $channel)

                            <tr>
                                <td>{{ $channel->title}} </td>

                                <td> <a href=" {{route('channels.edit',  ['channel' => $channel->id])}}" class="btn btn-info btn-xs">Edit</a> </td>
 
                                <td>
                                    <form action="{{ route('channels.destroy', ['channel' => $channel->id ]) }}" method="post">

                                        {{ csrf_field() }}

                                        {{ method_field('DELETE') }}

                                            <button class="btn btn-danger btn-xs" type="submit">Destroy </button>
                                    </form>
                                    

                            </tr>
                            @endforeach
                        </tbody>
                   
                    </table>
                </div>
            </div>
       
@endsection
