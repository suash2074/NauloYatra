@include('include.toppart')


{{-- @section('content') --}}

<body>
    {{-- @include('include.navbar') --}}


    <form action="https://uat.esewa.com.np/epay/main" method="GET">
        <input value="{{ $booking->advance_payment }}" name="tAmt" type="hidden">
        <input value="{{ $booking->advance_payment }}" name="amt" type="hidden">
        <input value="0" name="txAmt" type="hidden">
        <input value="0" name="psc" type="hidden">
        <input value="0" name="pdc" type="hidden">
        <input value="EPAYTEST" name="scd" type="hidden">
        <input value="{{ $booking->number }}" name="pid" type="hidden">
        <input value="{{ route('esewa-pay-confirm', ['success' => true, 'booking_id' => $booking->id]) }}" type="hidden"
            name="su">
        <input value="{{ route('esewa-pay-confirm', ['success' => false, 'booking_id' => $booking->id]) }}" type="hidden"
            name="fu">
        <input value="PAY WITH ESEWA" type="submit" class="btn btn-success" style="margin-bottom: 200px">
    </form>
    @include('include.footer')




    {{-- @stop --}}
    {{-- @push('js')
  
  
@endpush --}}
