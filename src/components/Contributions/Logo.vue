<template>
  <div>
    <g-image v-if="logo" :src=getImagePath(logo) width="200" class="logo m-auto"/>
    <font-awesome-icon v-if="!logo" class="side-menu-icon text-6xl" :icon="['fab', 'github-alt']"/>
  </div>
</template>

<script>
  export default {
    name: "Logo",
    props: ['logo'],
    methods: {
      getImagePath: (logo) => {
        return `./images/${logo}`;
      },
    }
  }
</script>

<style>

</style>
