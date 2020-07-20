<template>
    <div class="h-screen w-screen pl-32 pr-32 pt-10 text-center jobs">
        <h2 class="text-3xl mb-4"><b>Professional experience</b></h2>
        <hr/>

        <div v-for="job in jobs" class="pt-10">
            <Job v-bind:job=job />
        </div>
    </div>
</template>

<script>
  import jobs from '@/data/jobs.yml'
  import Job from './RoyJobs/Job';

  export default {
    components: {
      Job
    },
    name: 'RoyJobs',
    data() {
      return {jobs}
    },
  }
</script>

<style lang="scss">

    .jobs {
        hr {
            border-bottom: solid 1px #6bcff1;
        }
    }
</style>
