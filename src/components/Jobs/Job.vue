<template>
    <div class="job-display">
        <g-image :src=getImagePath(job) width="200" class="logo m-auto mt-4" />
        <div class="m-auto flex items-center justify-center pt-4">
            <font-awesome-icon class="arrow text-3xl mr-2" :icon="['fad', 'chevron-left']" />
            <h2 class="text-2xl font-bold">{{job.name}}, {{job.years}} - {{job.position}}</h2>
            <font-awesome-icon class="arrow text-3xl ml-2" :icon="['fad', 'chevron-right']" />
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
            max-height: 10vh;
        }
    }
</style>
