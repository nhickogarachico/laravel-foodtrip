<template>
  <div id="map"></div>
</template>
<script>
export default {
  props: {
    mapboxApiKey: String,
    removeMapMarker: Boolean,
    addressCoordinates: Array,
  },
  data() {
    return {
      addressFromCoordinates: "",
      mapCenter: [14.569299483936252, 120.99557384062871],
      marker: {},
      map: {},
    };
  },
  methods: {
    getAddress: function (coordinates) {
      this.$emit("map-click", coordinates);
    },
  },
  watch: {
    removeMapMarker: function (val) {
      if (val) {
        this.map.removeLayer(this.marker);
      }
    },
  },
  mounted() {
    this.map = L.map("map");
    // check if there is already data for coordinates then set center of map as well as place marker
    if (this.addressCoordinates !== undefined) {
      if (this.addressCoordinates.length > 0) {
        this.mapCenter = this.addressCoordinates;
        this.marker = L.marker(this.addressCoordinates).addTo(this.map);
      }
    }
    this.map.setView(this.mapCenter, 15);
    L.tileLayer(
      `https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=${this.mapboxApiKey}`,
      {
        attribution:
          'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        tileSize: 512,
        zoomOffset: -1,
      }
    ).addTo(this.map);

    this.map.on("move", () => {
      this.map.invalidateSize();
    });

    this.map.on("click", (e) => {
      this.getAddress(e.latlng);
      this.$emit('change-remove-map-marker');
      if (this.marker) {
        this.map.removeLayer(this.marker);
      }
      this.marker = L.marker(e.latlng).addTo(this.map);
    });
  },
};
</script>

<style>
#map {
  height: 400px;
}
</style>