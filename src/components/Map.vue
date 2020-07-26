<template>
  <div class="w-screen m-auto map text-center">

    <h2 class="text-4xl font-bold pb-4 title-for-text">
      Conferences I visited
    </h2>

    <l-map class="displayed-map" :zoom="zoom" :center="center">
      <l-tile-layer :url="url"></l-tile-layer>

      <l-marker
        @click="changeSelectedPlace(index)"
        class="place"
        v-for="(place, index) in places"
        v-bind:lat-lng=place.geo>
          <l-icon><Icon /></l-icon>
      </l-marker>
    </l-map>

    <Place
      @close="closePlace"
      v-if="selectedPlace !== null"
      v-bind:place=places[selectedPlace]
    />
  </div>
</template>

<script>
  import { LMap, LTileLayer, LMarker, LIcon } from "vue2-leaflet";
  import Place from "./Map/Place";
  import Icon from "./Map/Icon";
  import places from '@/data/places.yml'

  export default {
    name: "Map",
    components: {
      LMap,
      LTileLayer,
      LMarker,
      LIcon,
      Place,
      Icon,
    },
    methods: {
      changeSelectedPlace(index) {
        this.selectedPlace = index
      },
      closePlace() {
        this.selectedPlace = null
      }
    },
    data () {
      return {
        places,
        url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        zoom: 5,
        center: [45.313220, 15.319482],
        selectedPlace: null
      };
    }
  }
</script>

<style lang="scss">

  .map {
    min-height: 100vh;

    .displayed-map {
      height: 50vh;
      width: 75vw;
      margin: 0 auto;
    }

    .icon {
      color: #e6ab5d;
    }

    .place-description {
      position: relative;

      .close {
        position: absolute;
        top: 0;
        right: 0;
        color: #ffa2a2;
      }
    }
  }

</style>
