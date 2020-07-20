<template>
    <div class="h-screen w-screen section jobs">
        <h2 class="text-3xl mb-4"><b>Professional experience</b></h2>
        <hr/>

        <Job v-bind:job=jobs[0] class="pt-10" />
    </div>
</template>

<script>
  import jobs from '@/data/jobs.yml'
  import Job from './Jobs/Job';

  export default {
    components: {
      Job
    },
    name: 'Jobs',
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
