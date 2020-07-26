<template>
  <div class="m-auto w-3/4 text-left pt-10 grid grid-cols-12 text-to-read flex items-center items-stretch">
    <div class="col-span-3 text-center ">
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
    <div class="pl-4 col-span-9 place-description">
      <p v-html=place.description></p>
      <a>
        <font-awesome-icon
          v-on:click="$emit('close')"
          class="text-4xl close"
          :icon="['fad', 'times']" />
      </a>
    </div>
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
