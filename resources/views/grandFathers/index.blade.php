
<div class="card">
    <div class="card-header">
        <span>{{__('GrandFather') }}</span>
        <span class="float-right">
            <a href="#" data-target="#addGrandFather" class="shadow btn btn-info btn-xs" data-toggle="modal" > add</a>
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
            <caption>GrandFather</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($showAllGrantFathers as $count => $grandFathers)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td>{{ $grandFathers->name }}</td>
                        <td>{{ $grandFathers->phone }}</td>
                        <td>{{ $grandFathers->email }}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#edit-grand-father-{{$grandFathers->id}}" class="btn btn-info btn-xs">Edit</a>
                            @include('grandFathers.edit')

                            <a href="#" class="btn btn-danger btn-xs" onclick="confirm('You\'re about to delete {{ $grandFathers->name }}') ? document.getElementById('delete-grand-father-{{$grandFathers->id}}').submit() : '' ">Delete</a>

                            {{-- delete form to be submited once the button is clicked --}}
                            <form action="{{ route('grand-fathers.destroy',$grandFathers->id) }}" method="post" id="delete-grand-father-{{$grandFathers->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                            {{-- end delete form --}}
                        </td>
                    </tr>
                @empty
                    <span>No grand Fathers data registered</span>
                @endforelse
            </tbody>
        </table>
        
    </div>
     {{-- adding pagination  --}}
    {{-- {{ $showAllGrantFathers->links() }} --}}
</div>

{{-- include modal form for adding and editing grandParent --}}
@include('grandFathers.create')

