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
                
                
                <!-- content -->
                <div class="col-xs-12  col-sm-8 col-md-9 content">           
                    <h2>History Transaksi </h2>
                    @if(isset($date))
                        <h3>{{ $date }}</h3>
                    @endif

                      Date:
                    @if(isset($date))
                        <input type="date" name="date" id="date" value="{{ $date }}">
                    @else
                        <input type="date" name="date" id="date">
                    @endif
                        <button type="submit" name="date-filter-btn" id="date-filter-btn" onClick="filterDate()">Filter</button>
                    
                    <table class="table">
                    <thead>
                        <th>Tanggal</th>
                        <th>Merchant</th>
                        <th>Jumlah</th>
                    </thead>
                    <tbody>
                    @foreach($keuntungans as $keuntungan)
                        <tr>
                            <td>{{ $keuntungan->tanggal }}</td>
                            <td>{{ $keuntungan->merchant_id }}</td>
                            <td>{{ $keuntungan->jumlah }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                {{ $keuntungans->links() }}
            </div>
        </div>
        @include('general.bottom-scripts')
        <script type="text/javascript">
            var filterDate = function(){
                var date = document.getElementById("date").value;
                if(date.length>0){
                    window.location = "/admin/keuntungan/" + date;
                }
            }
        </script>
    </body>
</html>