<template>
  <div class="jobs w-screen" id="jobs">
    <section class="jobs-section" >
      <h2 class="jobs-section-h2">Jobs</h2>

      <Job class="job"
           @switch-job="switchJob"
           v-bind:job=jobs[index]
           v-bind:nextActive=nextActive()
           v-bind:prevActive=prevActive()
      />
    </section>

    <section class="filler
    xs:hidden
    sm:hidden
    md:hidden
"></section>
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

    .jobs-section {

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
