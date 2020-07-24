<template>
  <section class="text w-screen text-white text-center flex items-center pt-0 about">

    <div>
      <h2 class="pb-4 title-for-text">About me</h2>

      <div class="text-to-read text-xl w-3/4 m-auto">
        <p class="pb-4">
          Since I remember myself I love to explore. Every time something
          electrical went down, everyone knew that they need to give it to me so
          I could tear it down and see the inside. Explore the anatomy and see
          the kit, the electrical components and I did not afraid of breaking
          stuff since it's already headed to the garbage.
        </p>

        <p class="pb-4">
          Over the years, I change my position; Moved to a chair in front of a
          nice desk. At the beginning I started to help at local forums to
          support a popular bulletin board system but quickly I decided I want
          to create one by myself but in order to do that I need to know how to
          program. Eventually I learned by myself from books and tutorials and
          at school. At last I landed my first job at <em>gizra</em>.
        </p>

        <p class="pb-4">
          In addition to my daily job I love to contribute to open source
          projects. My contribution reflects that any non-commercial code which
          might be helpful to someone else, even for someone that built a site for
          his cat, will end up in a open repository over Github or even a blog
          post at Medium or on the blogs section in my employee site.
        </p>

        <p class="pb-4">
          My open source career has a couple of modules for <em>Drupal</em>,
          which impact big sites and organizations like <em>universities</em>
          or the european commission but there are couple of stuff that are
          really close to my heart: Organizing a couple of local
          <em>DrupalCamps</em> and working for NPO goes by the name
          <em>"The public knowledge workshop" (Hasadna)</em> which aims on taking
          a government data, or any public data, and make it easy to understand
          rather than handle confusing spreadsheets (which you can hear about
          it <em><a href="http://notarbut.co/ep84-public-knowledge/" class="underline">here</a></em>).
        </p>

        <p class="pb-4">
          Except for that, I own two cats, with my lovely fiance
          <em><a href="https://www.instagram.com/noythecatlady/" class="underline">Noy</a></em>,
          which goes by the names
          <em><a href="https://www.instagram.com/tomandsamthecats/" class="underline">Tom and Sam</a></em>.
          The female cat, <em>Tom</em>, is a real lady while <em>Sam</em>,
          the male cat, is a real trouble maker, but in a cute way.
        </p>

        <Pictures/>
      </div>

    </div>

  </section>
</template>

<script>
  import Pictures from "./Pictures";
  export default {
    name: 'Story',
    components: {Pictures}
  }
</script>

<style lang="scss">

  .about {
    em {
      color: white;
      font-weight: bold;
    }
  }
</style>
