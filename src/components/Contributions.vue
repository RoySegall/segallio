<template>

  <div class="h-screen w-screen contributions" id="contributions">

    <section class="main w-screen text-center">
      <h2 class="text-4xl font-bold text-white pb-4 title-for-text">Contributions</h2>

      <div class="w-3/4 m-auto text-to-read">
        <Filters v-bind:technologies=contributions.technologies />

        <div class="text-left pt-4 grid grid-cols-3 gap-3">
          <div v-for="repository in contributions.repositories" class="repository">
            <Repository v-bind:repository=repository />
          </div>
        </div>
      </div>

    </section>
  </div>

</template>

<script>
  import contributions from '@/data/contributions.yml';
  import Filters from './Contributions/Filters';
  import Repository from './Contributions/Repository';

  export default {
    name: "Contributions",
    components: {Filters, Repository},
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

    ul.technologies {

      li {
        margin-right: 1em;
        color: white;
        padding-left: .25em;
        padding-right: .25em;
        border-radius: .25em;

        &:nth-child(odd) {
          background: #65bad8;
        }

        &:nth-child(even) {
          background: #dda65c;
        }
      }
    }

    .repository {
      background: white;
      padding: 1em;
      /*border: solid 1px #65bad8;*/
    }
  }

</style>
