@extends('partials.template_pemesanan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-center my-3">Konfirmasi Pembayaran</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Menu</td>
                                    <td>Jumlah</td>
                                    <td>Harga</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->detail_pesanan as $menu)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $menu['name']}}</td>
                                        <td>{{ $menu['quantity']}}</td>
                                        <td>{{ $menu['price']}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">Toal Harga : {{ $data->total_harga}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" id="pay-button">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @php
        $order_id = $data->order_id;
    @endphp

@endsection
@section('script')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
          window.location.href = "{{ route('pemesanan.invoice') }}";
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
  </script>
@endsection