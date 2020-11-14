<div class="modal fade" id="addFather" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Father</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('fathers.store')}}" method="post">
              @csrf
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group input-group-sm">
                      <label for="name">Select Grand Father:</label>
                      <select class="form-control @error('grand_father_id') is-invalid @enderror" name="grand_father_id">
                            <option value="">--select grand father--</option>
                          @forelse ($showAllGrantFathers as $grandFather)
                              <option value="{{$grandFather->id}}">{{$grandFather->name}}</option>
                          @empty
                            <option value="">no grand father found</option>
                          @endforelse
                      </select>
                      @error('grand_father_id')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group input-group-sm">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}">
                      @error('name')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group input-group-sm">
                      <label for="phone">Phone:</label>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone')}}">
                      @error('phone')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group input-group-sm">
                      <label for="email">Email:</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}">
                      @error('email')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group input-group-sm">
                      <input type="submit" class="btn btn-info btn-sm" >
                    </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
</div>