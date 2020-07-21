<template>
    <div class="h-screen w-screen section blogs">
        <h2 class="text-3xl mb-6"><b>Recent blog posts</b></h2>
        <hr />

        <p class="text-xl pb-6 pt-6">Here you read various blog posts I wrote over the years: From my time at Gizra, and my blog posts at Medium.com</p>


        <div v-for="blog in blogs" class="text-left mb-4 blog">
            <div class="pb-4"><a :href=blog.url target="_blank" class="text-blue-400 text-2xl hover:underline"><b>{{blog.title}}</b></a>
            </div>

            <div class="pb-4">
                <span class="text-blue-800 font-bold">Published on:</span> {{blog.date}}, <span
                    class="text-orange-500 font-bold">Published in:</span> {{blog.source}}
            </div>

            <p class="pb-4">
                {{blog.intro}}
            </p>

            <hr/>
        </div>
    </div>
</template>

<script>
  import blogs from '@/data/blogs.yml'

  export default {
    name: 'Blogs',
    created() {
      this.blogs = blogs.splice(0, 3);
    },
    data() {
      return {blogs}
    },
  }
</script>

<style lang="scss">
    .blogs {

        .blog {

            hr {
                width: 60vh;
                margin: 0 auto;
            }

            &:nth-child(even) {
                hr {
                    border-bottom: solid 1px #f7b75e;
                }
            }

            &:nth-child(odd) {
                hr {
                    border-bottom: solid 1px #6bcff1;
                }
            }
        }

        hr {
            border-bottom: solid 1px #f7b75e;
        }
    }
</style>
