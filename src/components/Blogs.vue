<template>
    <div class="h-screen w-screen blogs">

        <section class="main w-screen text-center">
            <h2 class="text-4xl font-bold pb-4 text-white">Recent blog posts</h2>

            <div class="m-auto">
                <div v-for="blog in blogs" class="blog">
                    {{blog.title}}
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
        .main {
            background: #67c1e0;
            height: 50vh;
            padding-top: 2em;
        }
     }
</style>
