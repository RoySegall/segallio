<template>
  <div class="h-screen w-screen blogs">

    <section class="main w-screen text-center">
      <h2 class="text-4xl font-bold pb-12 text-white">Recent blog posts</h2>

      <div class="m-auto w-3/4 grid grid-cols-3 gap-3">
        <div v-for="blog in blogs"
             class="blog pl-5 pr-5 pt-5 flex items-center">

          <div>
                        <span class="font-bold underline pb-5 text-2xl block">
                            <a :href=blog.url target="_blank">{{blog.title}}</a>
                        </span>

            <span class="block font-bold">{{blog.source}}, <span class="date">{{blog.date}}</span>.</span>

            <p class="pt-4 pb-8 text-left font-light leading-loose">
              <font-awesome-icon class="icon fa-2x fa-pull-left"
                                 :icon="['fad', 'quote-left']"/>
              <span class="italic">{{blog.intro}}</span>
              <font-awesome-icon class="icon fa-2x fa-pull-right"
                                 :icon="['fad', 'quote-right']"/>
            </p>
          </div>

        </div>
      </div>

    </section>

    <section class="filler"></section>
  </div>
</template>

<script>
  import blogs from '@/data/blogs.yml'

  export default {
    name: 'Blogs',
    data() {
      return {blogs}
    },
  }
</script>

<style lang="scss">

  .blogs {
    .main, .filler {
      background: #67c1e0;
      height: 50vh;
      padding-top: 2em;

      .blog {
        background: white;
        height: 28vh;

        .date, .icon {
          color: #e6ab5d;
        }
      }
    }
  }
</style>
