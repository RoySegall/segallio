<template>
  <section class="text w-screen text-white text-center flex items-center pt-0 about">

    <div>
      <h2 class="pb-4 title-for-text">About me</h2>

      <div class="text-to-read text-xl w-3/4 m-auto">
        <p class="pb-4">
          Ever since I can remember, I have always loved investigating and
          discovering how things work. I was soon known as the guy everyone
          turned to whenever an electronic device broke down. I enjoyed
          separating the broken devices and studying the different electrical
          components, which I was able to do freely and carelessly without the
          risk of destroying the already ruined device.
        </p>

        <p class="pb-4">
          With the knowledge I’ve gained, I moved on up to sit on a chair at a
          nice desk. I started by helping local forums to support a popular
          bulletin board system but had quickly decided that I want to create
          one by myself. In order to do that, however, one needs to know
          programming - and so, I’ve taught myself using books and tutorials,
          enabling me to qualify for my first job at <em>Gizra</em>.
        </p>

        <p class="pb-4">
          In my free time I enjoy contributing to open source projects. I do so
          by providing non-commercial codes that can help others. The biggest
          and smallest cause alike, even someone whose goal is to simply create
          a website about his cat, can then find a code to help them in an open
          repository at Github or a blog post at <em>Medium</em>.
        </p>

        <p class="pb-4">
          My accomplishments in my open source career include a few modules for
          <em>Drupal</em>, used by large organizations like universities and the
          EU. Other accomplishments, which I am very proud of as I hold them
          dear to my heart, include a couple of local DrupalCamps I’ve
          successfully organized as well as working for the NPO:
          <em>"The public knowledge workshop" (Hasadna)</em>, whose goal is to make
          government or any other public data more accessible than it currently
          is and easier to understand without having to go through confusing
          spreadsheets.
        </p>

        <p class="pb-4">
          Besided work and programming, I live with my fiancée,
          <a href="https://www.instagram.com/noythecatlady/" class="underline"><em>Noy</em></a>
          and our two cats -
          <a href="https://www.instagram.com/tomandsamthecats/" class="underline"><em>Tom</em></a>,
          the female cat, is quite the lady, while
          <a href="https://www.instagram.com/tomandsamthecats/" class="underline"><em>Sam</em></a>,
          the male cat, is the adorable troublemaker.
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
