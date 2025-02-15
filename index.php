<?php
/*
  Plugin Name: Odivino Shortcodes
  Description: Plugin fournissant des shortcodes
  Author: gui2one
  Version: 1.0.0
 */

 function shortcode_google_map(){

    $mods = get_theme_mods();
    // print_r($mods);
    $coords = $mods['odivino_google_maps_coords'];
    $api_key = $mods['odivino_google_maps_api_key'];
    $map_id = $mods['odivino_google_maps_map_id'];
    // die();
    // $value  = esc_attr($coords);
    return "
    
<div id='map' style='height: 100vh; width: 100%;'></div>

<script>
    function initMap() {
        var coords_str = '$coords'; 
        var lat = parseFloat(coords_str.split(',')[0]);
        var lng = parseFloat(coords_str.split(',')[1]);
        var location = {lat: lat, lng: lng};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: location,
            zoomControl: true,
            scaleControl: true,
            mapId:'$map_id',
        });
        var marker = new google.maps.marker.AdvancedMarkerElement({
            map: map,
            position: location,
            title: 'Odivino',

        });
    }
</script>
    <script async defer
    src='https://maps.googleapis.com/maps/api/js?key=$api_key&callback=initMap&loading=async&libraries=marker'>
    </script>";
}
add_shortcode('odivino-google-map', 'shortcode_google_map');