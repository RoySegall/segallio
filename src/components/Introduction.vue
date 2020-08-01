<template>
  <div class="introduction first-section">
    <h1 class="introduction-h1">Hello, I'm Roy Segall</h1>
    <p class="introduction-p">
      Enthusiastic, self-learned, highly
      motivated, love to explore new technologies
    </p>
    <p class="introduction-p">and contributing to open-source projects.</p>
    <g-image
      src="~/assets/images/funnyProfilePicture.png"
      class="m-auto pt-10 block"
      width="500"/>

    <Social class="block w-full pt-16 pb-2"/>
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
    min-height: 100vh;

    h1 {
      font-family: 'Rubik', cursive;
    }
  }

</style>
