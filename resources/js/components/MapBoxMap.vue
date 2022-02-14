<template>
  <div id="map"></div>
</template>
<script>
export default {
  props: {
    mapboxApiKey: String,
  },
  data() {
    return {
      addressFromCoordinates: "",
    };
  },
  methods: {
    getAddress: function (coordinates) {
      this.$emit("map-click", coordinates);
    },
  },
  mounted() {
    let map = L.map("map").setView(
      [14.569299483936252, 120.99557384062871],
      15
    );
    L.tileLayer(
      `https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=${this.mapboxApiKey}`,
      {
        attribution:
          'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        tileSize: 512,
        zoomOffset: -1,
      }
    ).addTo(map);

    let marker = {};
    map.on("click", (e) => {
      this.getAddress(e.latlng);

      if (marker) {
        map.removeLayer(marker);
      }
      marker = L.marker(e.latlng).addTo(map);
    });
  },
};
</script>

<style>
#map {
  height: 400px;
}
</style>