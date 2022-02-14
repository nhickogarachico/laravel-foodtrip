<template>
  <div id="map"></div>
</template>
<script>
export default {
  props: {
    mapboxApiKey: String,
  },
  mounted() {
    L.mapbox.accessToken = this.mapBoxApiKey;

    var mapboxTiles = L.tileLayer(
      "https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=" +
        L.mapbox.accessToken,
      {
        attribution:
          '© <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        tileSize: 512,
        zoomOffset: -1,
      }
    );

    var map = L.map("map")
      .addLayer(mapboxTiles)
      .setView([42.361, -71.0587], 15);
  },
};
</script>

<style>
#map {
  position: absolute;
  top: 0;
  bottom: 0;
  width: 100%;
}
</style>