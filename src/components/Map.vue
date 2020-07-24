<template>

  <div class="w-screen h-screen m-auto map text-center">

    <h2 class="text-4xl font-bold pb-4 title-for-text">Conferences I visited</h2>
    <l-map class="displayed-map" :zoom="zoom" :center="center">
      <l-tile-layer :url="url"></l-tile-layer>

      <l-marker @click="innerClick(index)" class="place" v-for="(place, index) in places" v-bind:lat-lng=place.geo>

        <l-icon>
          <a href="#">
            <font-awesome-icon class="text-4xl icon" :icon="['fas', 'map-marker-alt']"/>
          </a>
        </l-icon>

      </l-marker>
    </l-map>

    <div class="m-auto w-3/4 text-left pt-10 grid grid-cols-12 text-to-read flex items-center items-stretch" v-if="selectedPlace !== null">
      <div class="col-span-3 text-center ">
<!--        <g-image class="pb-2" :src="require(`!!assets-loader!@images/${places[selectedPlace].image}`)"  />-->

        <span class="hand-writing text-3xl">{{places[selectedPlace].title}}, {{places[selectedPlace].year}}</span>
      </div>
      <div class="pl-4 col-span-3">
        <p v-html=places[selectedPlace].description></p>
      </div>
    </div>
  </div>

</template>

<script>
  import { LMap, LTileLayer, LMarker, LIcon } from "vue2-leaflet";
  import places from '@/data/places.yml'

  export default {
    name: "Map",
    components: {
      LMap,
      LTileLayer,
      LMarker,
      LIcon
    },
    methods: {
      innerClick(index) {
        this.selectedPlace = index
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
  }

</style>
