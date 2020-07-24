<template>
  <div class="about-me">
    <SideMenu/>
    <Story/>
    <SuperPowers/>
  </div>
</template>

<script>
  import SuperPowers from './About/SuperPowers';
  import Story from './About/Story';

  import SideMenu from "~/components/SideMenu.vue"

  export default {
    components: {
      SuperPowers,
      Story,
      SideMenu,
    },
    name: 'About',
    data() {
      return {}
    },
  }
</script>

<style lang="scss">

  .about-me {

    .text {
      background: #69c8e8;
    }

    section {
      padding-top: 2em;
      min-height: 50vh;
    }

    .filler {
      min-height: 50vh;
    }
  }
</style>
