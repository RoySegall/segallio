<template>
  <div class="job-display text-to-read">
    <a :href=job.url target="_blank">
      <g-image :src=getImagePath(job) width="200" class="logo m-auto"/>
    </a>

    <div class="job-item">
      <a v-bind:class="{'cursor-pointer': prevActive}"
         v-on:click="$emit('switch-job', 'prev')">
        <font-awesome-icon
          v-bind:class="{'arrow text-5xl ml-2': 1, 'active': prevActive}"
          :icon="['fad', 'chevron-left']"/>
      </a>

      <div>
        <h3 class="text-3xl font-bold">{{job.name}}, {{job.years}}:
          {{job.position}}</h3>

        <p class="job-description description" v-html=job.description></p>
      </div>

      <a v-bind:class="{'cursor-pointer': nextActive}"
         v-on:click="$emit('switch-job', 'next')">
        <font-awesome-icon
          v-bind:class="{'arrow text-5xl ml-2': 1, 'active': nextActive}"
          :icon="['fad', 'chevron-right']"/>
      </a>
    </div>

  </div>

</template>

<script>
  export default {
    name: 'Job',
    props: ['job', 'nextActive', 'prevActive'],
    methods: {
      getImagePath: (job) => {
        return `./images/${job.logo}`;
      },
    }
  }
</script>

<style lang="scss">

  .job-display {

    .logo {
      margin-top: 7vh;
      height: 7vh;
    }

    .description {
      text-align: left;
      max-height: 60vh;
      overflow: scroll;

      p {
        margin-bottom: .75em;

        em {
          font-weight: bold;
          text-decoration: underline;
          color: #65bad8;
        }
      }
    }

    .arrow {

      &.active {
        color: #67c1e0;
      }
    }
  }
</style>
