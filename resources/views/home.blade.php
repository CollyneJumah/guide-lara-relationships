@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-grandFather" role="tab" aria-controls="nav-home" aria-selected="true">GRANDFANTERS</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-father" role="tab" aria-controls="nav-profile" aria-selected="false">FATHERS</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-sone" role="tab" aria-controls="nav-contact" aria-selected="false">SON</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-grandFather" role="tabpanel" aria-labelledby="nav-home-tab">
                    @include('grandFathers.index')
                </div>
                <div class="tab-pane fade" id="nav-father" role="tabpanel" aria-labelledby="nav-profile-tab">
                    
                </div>
                <div class="tab-pane fade" id="nav-son" role="tabpanel" aria-labelledby="nav-contact-tab">
                    
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
