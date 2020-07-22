<template>
    <div class="jobs">
        <section class="main w-screen text-center">
            <h2 class="text-4xl font-bold pb-4 text-white">Jobs</h2>

            <div class="job flex items-center">
                <Job @switch-job="switchJob" v-bind:job=jobs[index] />
            </div>
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
          if (this.index === this.jobs.length -1) {
            return;
          }

          this.index = this.index + 1;

        } else {

          if (this.index === 0) {
            return;
          }

          this.index = this.index - 1;
        }
      }
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
            padding-top: 2em;

            .job {
                background-color: white;
                border-radius: 6px;
                color: #141c3a;
                /*display: block;*/
                padding: 1.25rem;
                min-height: 60vh;
                width: 100vh;
                border: solid 2px #e6ab5d;
                margin: 0 auto;
                margin-top: 2em;

            }
        }

        .filler {
            height: 50vh;
        }
    }

</style>
