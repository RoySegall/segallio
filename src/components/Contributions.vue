<template>

  <div class="h-screen w-screen contributions">

    <section class="main w-screen text-center" id="contributions">
      <h2 class="text-4xl font-bold text-white pb-4 title-for-text">Contributions</h2>

      <div class="w-3/4">
        <ul>
          <li v-for="technology in contributions.technologies" class="text-6xl">
            <a>
              <font-awesome-icon class="side-menu-icon" :icon="['fab', technology.icon]"/>
            </a>
          </li>
        </ul>
      </div>

    </section>
  </div>

</template>

<script>
  import contributions from '@/data/contributions.yml';

  export default {
    name: "Contributions",
    data() {
      return {
        contributions
      }
    }
  }
</script>

<style lang="scss">

  .contributions {
    min-height: 100vh;
    width: 100vw;
    padding-top: 2em;
    background: #e6ab5d;
  }

</style>
