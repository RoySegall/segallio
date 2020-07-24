<template>
  <div class="job-display">
    <g-image :src=getImagePath(job) width="200" class="logo m-auto"/>

    <div class="m-auto flex items-center justify-center pt-10 pb-4">

      <a class="cursor-pointer" v-on:click="$emit('switch-job', 'prev')">
        <font-awesome-icon class="arrow text-3xl mr-2"
                           :icon="['fad', 'chevron-left']"/>
      </a>

      <h2 class="text-3xl font-bold">{{job.name}}, {{job.years}} -
        {{job.position}}</h2>

      <a class="cursor-pointer" v-on:click="$emit('switch-job', 'next')">
        <font-awesome-icon class="arrow text-3xl ml-2"
                           :icon="['fad', 'chevron-right']"/>
      </a>
    </div>

    <p class="pt-10 w-5/6 m-auto leading-loose">{{job.description}}</p>
  </div>

</template>

<script>
  export default {
    name: 'Job',
    props: ['job'],
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

    .arrow {
      color: #67c1e0;
    }
  }
</style>
