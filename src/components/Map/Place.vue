<template>
  <div class="m-auto w-3/4 text-left pt-10 grid grid-cols-12 text-to-read flex items-center items-stretch">
    <div class="col-span-3 text-center ">
      <g-image class="pb-2" :src="require(`!!assets-loader!@images/${place.image}`)" width="200" />

      <span class="hand-writing text-3xl">{{place.title}}, {{place.year}}</span>
    </div>
    <div class="pl-4 col-span-3">
      <p v-html=place.description></p>
      <font-awesome-icon class="text-4xl close" :icon="['fad', 'times']"/>
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
