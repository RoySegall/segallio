<template>
  <div class="h-screen w-screen flex items-center">
    <div class="text-center m-auto first-section">
      <h1 class="text-6xl">Hello, I'm Roy Segall</h1>

      <p class="text-4xl pt-10 font-hairline">Enthusiastic, self-learned, highly
        motivated, love to explore new technologies</p>
      <p class="text-4xl font-hairline">and contributing to open-source
        projects.</p>

      <g-image src="~/assets/images/funnyProfilePicture.png"
               class="m-auto pt-10" width="500"/>

      <Social class="pt-16"/>
    </div>
  </div>

</template>

<script>
  import Social from './About/Social';

  export default {
    name: 'Introduction',
    components: {
      Social,
    },
    data() {
      return {}
    },
  }
</script>

<style lang="scss">

  .first-section {

    h1 {
      font-weight: 700;
      font-family: 'Rubik', cursive;
    }

    .about-me {
      background: #69c8e8;
      color: white;
      min-height: 25vh;
    }
  }

</style>
