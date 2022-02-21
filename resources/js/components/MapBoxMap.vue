<template>
  <div id="map"></div>
</template>
<script>
export default {
  props: {
    mapboxApiKey: String,
    addressCoordinates: Array,
  },
  data() {
    return {
      addressFromCoordinates: "",
      mapCenter: [14.569299483936252, 120.99557384062871],
    };
  },
  methods: {
    getAddress: function (coordinates) {
      this.$emit("map-click", coordinates);
    },
  },
  mounted() {
    let map = L.map("map");
    let marker = {};

    // check if there is already data for coordinates then set center of map as well as place marker
    if (this.addressCoordinates !== undefined) {
      if (this.addressCoordinates.length > 0) {
        this.mapCenter = this.addressCoordinates;
        marker = L.marker(this.addressCoordinates).addTo(map);
      }
    }

    map.setView(this.mapCenter, 15);
    L.tileLayer(
      `https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=${this.mapboxApiKey}`,
      {
        attribution:
          'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        tileSize: 512,
        zoomOffset: -1,
      }
    ).addTo(map);

    map.on("move", () => {
      map.invalidateSize();
    });

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