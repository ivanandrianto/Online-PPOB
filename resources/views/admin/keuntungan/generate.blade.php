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
                        <h1>Generate Keuntungan</h1>
                </div>
            </div>
            <div class="row">
                @include('general.sidebar-accountant')
                <div class="col-xs-12  col-sm-8 col-md-9 content">
                    <button class="btn-danger" type="submit" name="date-filter-btn" id="date-filter-btn" onClick="generate()">Generate</button></br>
                    Keuntungan akan digenerate untuk tiap merchant per harinya, mulai dari tanggal setelah terakhir kali generate dilakukan sampai kemarin.
                </div>
            </div>
        </div>
        @include('general.bottom-scripts')
        <script type="text/javascript">
            var generate = function(){

                $.ajax({
                    type: "GET",
                    url: "/api/v1/keuntungan/generate",
                    cache: false,
                    success: function(data){
                        alert(data);
                    },
                    error: function(data){
                        alert(data);
                    }
                });
            }
        </script>
    </body>
</html>