<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ARDANA OnLiNe</title>
        @include('general.head')
    </head>

    <body>
        @include('general.navbar')
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <h1>Transaksi</h1>
                </div>
            </div>
            <div class="row">
                @include('general.sidebar-accountant')
                <div class="col-xs-12 col-sm-8 col-md-9 content">
                    Date:
                    @if(isset($date))
                        <input name="date" id="date" value="{{ $date }}">
                    @else
                        <input name="date" id="date">
                    @endif
                    Merchant:
                    <select name="merchant_id" id="merchant_id">
                        <option value="0" selected>All</option>
                        @foreach($merchants as $merchant)
                        @if($merchant->id == $merchant_id)
                        <option value="{{ $merchant->id }}" selected>{{ $merchant->nama }}</option>
                        @else
                        <option value="{{ $merchant->id }}">{{ $merchant->nama }}</option>
                        @endif
                        @endforeach
                    </select>
                    <button type="submit" name="date-filter-btn" id="date-filter-btn" onClick="filterDate()">Filter</button>
                    
                    <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Merchant</th>
                        <th>Item</th>
                        <th>Harga</th>
                    </thead>
                    <tbody>
                    @foreach($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ $transaksi->created_at }}</td>
                            <td>{{ $transaksi->merchant->nama }}</td>
                            <td>{{ $transaksi->item->nama }}</td>
                            <td>{{ $transaksi->harga }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                {{ $transaksis->links() }}
            </div>
        </div>
        @include('general.bottom-scripts')
        <script type="text/javascript">
            var filterDate = function(){

                var url = "/admin/transaksi?";

                var date = document.getElementById("date").value;

                if((date != null) && (date.length>0)){                    
                    url+="date="+date+"&";
                }
                var merchant_id = document.getElementById("merchant_id").value;
                if(merchant_id != null){
                    url+="merchant="+merchant_id;
                }
                window.location = url;
            }
        </script>
        <link href="<?= asset('css/jquery-ui.css') ?>" rel="stylesheet">
        <script>
            $(function() {
                 $( "#date" ).datepicker({ dateFormat: 'yy-mm-dd'}); 
            });
             $(function() {
                $( "#date" ).datepicker();
             });
        </script>
    </body>
</html>