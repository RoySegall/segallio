<template>
  <div class="jobs" id="jobs">
    <section class="main w-screen text-center" >
      <h2 class="text-4xl font-bold  text-white title-for-text pb-4 sm:pb-0 md:pb-0 md:pb-0 pt-4">Jobs</h2>

      <Job class="job"
           @switch-job="switchJob"
           v-bind:job=jobs[index]
           v-bind:nextActive=nextActive()
           v-bind:prevActive=prevActive()
      />
    </section>

    <section class="filler"></section>
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
    methods: {
      switchJob: function (position) {

        if (position === 'prev') {
          if (this.index === this.jobs.length - 1) {
            return;
          }

          this.index = this.index + 1;

        } else {

          if (this.index === 0) {
            return;
          }

          this.index = this.index - 1;
        }
      },
      nextActive: function () {
        return this.index !== 0;
      },

      prevActive: function () {
        return this.index + 1 !== this.jobs.length;
      },
    },
    data() {
      return {
        jobs,
        index: 0,
      }
    },
  }
</script>

<style lang="scss">

  .jobs {
    width: 100vw;

    .main {
      height: 50vh;
      background: #efb15e;

      .job {
        background-color: white;
        border-radius: 6px;
        color: #141c3a;
        padding: 1.25rem;
        min-height: 60vh;
        max-width: 100vh;
        border: solid 2px #e6ab5d;
        margin: 0 auto;
      }
    }

    .filler {
      min-height: 50vh;
    }
  }

</style>
