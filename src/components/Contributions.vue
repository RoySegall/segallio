<template>

  <div class="h-screen w-screen contributions" id="contributions">

    <section class="main w-screen text-center">
      <h2 class="text-4xl font-bold text-white pb-4 title-for-text">
        Contributions</h2>

      <div class="w-3/4 m-auto text-to-read">
        <ul class="flex filter text-white text-5xl">
          <li>Filter by:</li>
          <li>
            <font-awesome-icon class="side-menu-icon"
                               :icon="['fad', 'not-equal']"/>
          </li>
          <li v-for="technology in contributions.technologies" class="">
            <a>
              <font-awesome-icon class="side-menu-icon" :icon="['fab', technology.icon]"/>
            </a>
          </li>
        </ul>

        <div class="text-left pt-4 grid grid-cols-3 gap-3">
          <div
            v-for="repository in contributions.repositories"
            class="repository"
          >
            <div class="grid grid-cols-6 items-center">

              <div class="col-span-1">
                <g-image v-if="repository.logo" :src=getImagePath(repository) width="200" class="logo m-auto"/>
                <font-awesome-icon v-if="!repository.logo" class="side-menu-icon text-6xl" :icon="['fab', 'github-alt']"/>
              </div>
              <div class="col-span-5">

                <span class="text-2xl font-bold underline block">
                  <a v-bind:href=repository.url target="_blank">{{repository.name}}</a>
                </span>

                <p class="pt-2 pb-2 font-light leading-loose" v-html=repository.description></p>

                <div class="pt-2">
                  <div class="inline">
                    Position: <span
                    class="font-bold">{{repository.position}}</span>,
                    Technologies:
                  </div>
                  <ul class="pl-2 technologies inline">
                    <li v-for="technology in repository.technologies"
                        class="inline-block">{{technology}}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
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
    },
    methods: {
      getImagePath: (techonlogy) => {
        return `./images/${techonlogy.logo}`;
      },
    }
  }
</script>

<style lang="scss">

  .contributions {
    min-height: 100vh;
    width: 100vw;
    padding-top: 2em;
    background: #e6ab5d;

    ul.filter {

      li {
        padding-right: 1em;
      }
    }

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
