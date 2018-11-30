@extends('helicopters.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Helicopters</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('helicopters.create') }}"> Create New Helicopter</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Type</th>
            <th>Name</th>
            <th>speed</th>
            <th>Color</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($helicopters as $helicopter)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $helicopter->name }}</td>
            <td>{{ $helicopter->type }}</td>
            <td>{{ $helicopter->speed }}</td>
            <td>{{ $helicopter->color }}</td>
            <td>
                <form action="{{ route('helicopters.destroy',$helicopter->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('helicopters.show',$helicopter->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('helicopters.edit',$helicopter->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $helicopters->links() !!}
      
@endsection