<template>
  <div class="text-center">
    <g-image
      class="pb-2"
      :src="require(`!!assets-loader!@images/${place.image}`)"
      width="200" />

    <p v-if="place.rights" class="text-xs">
      The image was shot by <b>{{place.rights.publisher}}</b>, posted at
      <a :href=place.rights.url class="font-bold underline">{{place.rights.source}}</a>
      and uploaded by the next
      <a :href=place.rights.license class="font-bold underline">terms</a>.
    </p>
    <span class="hand-writing text-3xl">{{place.title}}, {{place.year}}</span>
  </div>
</template>

<script>
  export default {
    name: "Place",
    props: ['place']
  }
</script>

<style scoped>

</style>
