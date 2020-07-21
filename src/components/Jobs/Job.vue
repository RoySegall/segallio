<template>
    <div class="job grid grid-cols-6 mb-6 pb-10 text-left">
        <div :class=job.class class="col-span-1">
            <g-image :src=getImagePath(job) fit="contain"/>
        </div>

        <div class="col-span-5 info align-left text-xl ml-10">
            <span class="font-bold">{{job.years}}</span>;
            <span class="font-bold">{{job.name}}</span>,
            <span class="font-bold">{{job.position}}</span>. <span
                class="description leading-9">{{job.description}}</span>
        </div>
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

    .job {


        @media only screen and (max-width: 600px) {
            img {
                margin-bottom: .25em;
            }

            .dreamed-diabetes {

                img {
                    max-width: 30%;
                }
            }

            .taliaz {

                img {
                    max-width: 60%;
                }
            }

            .rc {
                img {
                    max-width: 30%;
                }
            }

            .gizra {
                img {
                    max-width: 50%;
                }
            }
        }
    }
</style>
