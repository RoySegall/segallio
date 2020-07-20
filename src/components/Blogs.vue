<template>
    <div class="h-screen w-screen pl-32 pr-32 pt-10 text-left blogs">
        <h2 class="text-3xl"><b>Recent blog posts</b></h2>
        <hr class="mb-10"/>

        <div v-for="blog in blogs" class="text-left mb-4">
            <div class="pb-4"><a :href=blog.url target="_blank"><b>{{blog.title}}</b></a></div>

            <div class="pb-4">
                <span class="date">Published on:</span> {{blog.date}}, <span class="source">Published in:</span> {{blog.source}}
            </div>

            <p class="pb-4">
                {{blog.intro}}
            </p>

            <hr />
        </div>
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
        hr {
            border-bottom: solid 1px #f7b75e;
        }
    }
</style>
