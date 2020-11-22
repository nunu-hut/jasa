<form>
   <input type="text" name="alamat" id="alamat" >
   <button type="button" onclick="getlonglat()"> Cek Koordinat </button>
   <div class="inputan-long-lat"></div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyB0Di-e81uG7hXdq7nmcRZqucb3K_YVuF4"></script>

<script>
function getlonglat(){
 var geocoder =  new google.maps.Geocoder();
 var alamat = document.getElementById("alamat").value;
    geocoder.geocode( { 'address': alamat}, function(results, status) {
    //alert(status)
      if (status == google.maps.GeocoderStatus.OK) {
      var Lat = results[0].geometry.location.lat();
      var Lng = results[0].geometry.location.lng();
       $('.inputan-long-lat').html("Longitude<br><input type='text' name='lat' value='"+Lat+"'/><br/>Latitude<br><input type='text' name='long' value='"+Lng+"'/>"); 
      } else {
        $('.inputan-long-lat').text("Something got wrong " + status);
      }
    });
}
</script>