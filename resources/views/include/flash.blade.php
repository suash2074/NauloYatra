@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <i class="fa-solid fa-triangle-exclamation"></i>
        {{-- <i class="fa-solid fa-circle-exclamation"></i> --}}
        {{-- <i class="fa-sharp fa-solid fa-circle-exclamation"></i> --}}
        {{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        {{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        {{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
        <strong>{{ $message }}</strong>
    </div>
@endif
