<template>
  <div class="images">
    <ul class="flex lg:items-center justify-between items-stretch pt-8">
      <li v-for="polaroid in polaroids" class="polaroid shadow-2xl">
<!--        <font-awesome-icon class="ml-1 text-xl text-right text-black icon shadow-2xl" :icon="['fas', 'thumbtack']"/>-->
        <g-image :src="require(`!!assets-loader!@images/${polaroid.image}`)" width="100"  />

        <p class="hand-writing text-2xl">{{polaroid.text}}</p>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    name: "Pictures",
    data() {
      return {
        polaroids: [
          {image: 'gizra.jpeg', text: 'With the gizra guys'},
          {image: 'hasadna.jpeg', text: 'At the "Hasadna"'},
          // {image: 'me.jpeg', text: 'At DrupalCamp 2017'},
          {image: 'family.jpeg', text: 'My family'},
        ],
      }
    },
    methods: {
      getImagePath: (job) => {
        return `./images/${job}`;
      }
    }
  }
</script>

<style lang="scss">

  .images {

    ul {
      padding-bottom: 1em;

      .polaroid {
        background: white;
        padding: 1vh;
        position: relative;

        .icon {
          position: absolute;
          font-size: 2em;

          top: -.75em;
          color: #e6ab5d;
        }

        &:nth-child(odd) {

          .icon {
            left: -.5em;
          }
        }

        &:nth-child(even) {

          .icon {
            right: -.25em;
          }
        }

        img {
          margin-bottom: .75em;
          width: 10em;
        }

        p {
          color: black;
        }
      }
    }
  }
</style>
