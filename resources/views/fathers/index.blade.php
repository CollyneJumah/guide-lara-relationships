
<div class="card">
    <div class="card-header">
        <span>{{__('Fathers') }}</span>
        <span class="float-right">
            <a href="#" data-target="#addFather" class="shadow btn btn-info btn-xs" data-toggle="modal" > add</a>
        </span>
    </div>

    <div class="card-body">
        {{-- message display session starts --}}
        @if (session()->has('message'))
            <strong class="text-success">{{ session('message')}}</strong>
        @else
            <span>,,,,,</span>
        @endif
        {{-- end session message display --}}
        <table class="table table-bordered table-strip table-hover">
            <caption>Father</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>GrandFather's name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($showAllFathers as $count => $father)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td>{{ $father->name }}</td>
                        <td>{{ $father->grandFather->name }}</td>
                        <td>{{ $father->phone }}</td>
                        <td>{{ $father->email }}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#edit-father-{{$father->id}}" class="btn btn-info btn-xs">Edit</a>
                            @include('fathers.edit')

                            <a href="#" class="btn btn-danger btn-xs" onclick="confirm('You\'re about to delete {{ $father->name }}') ? document.getElementById('delete-grand-father-{{$father->id}}').submit() : '' ">Delete</a>

                            {{-- delete form to be submited once the button is clicked --}}
                            <form action="{{ route('fathers.destroy',$father->id) }}" method="post" id="delete-father-{{$father->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                            {{-- end delete form --}}
                        </td>
                    </tr>
                @empty
                    <span>No fathers data registered</span>
                @endforelse
            </tbody>
        </table>
        
    </div>
     {{-- adding pagination  --}}
    {{-- {{ $showAllGrantFathers->links() }} --}}
</div>

{{-- include modal form for adding and editing grandParent --}}
@include('fathers.create')

