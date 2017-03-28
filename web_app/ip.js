function showPosition() {
    maping(la,lo);
}
function maping(a,b) 
{
        var LatLng = new google.maps.LatLng(a, b);
        var mapOptions = {
            center: LatLng,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP};
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        var marker = new google.maps.Marker({
            position: LatLng,
            map: map,
            title: "<div class='popup' style = 'height:60px;width:200px'><b>Your location:</b><br />Latitude: " + a + "<br />Longitude: " + b
        });
        google.maps.event.addListener(marker, "mouseover", function (e) {
            var infoWindow = new google.maps.InfoWindow();
            infoWindow.setContent(marker.title);
            infoWindow.open(map, marker);
        });
}                