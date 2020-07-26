<template>
  <div class="side-menu">
    <ul>
      <li v-for="link in links">
        <a :href=link.section>
          <font-awesome-icon class="side-menu-icon" :icon="['fad', link.icon]"/>
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    name: "SideMenu",

    data() {
      return {links: [
          {icon: 'user-circle', section: '#about'},
          {icon: 'laptop-code', section: '#jobs'},
          {icon: 'book-reader', section: '#blogs'},
          {icon: 'map-marked', section: '#places'},
      ]}
    },
    created() {
      window.addEventListener('scroll', this.handleScroll);
    },
    destroyed() {
      window.removeEventListener('scroll', this.handleScroll);
    },

    methods: {
      handleScroll(event) {
        let aboutMe = document.querySelector(".about-me");
        let sideMenu = document.querySelector(".side-menu");

        if (window.pageYOffset > aboutMe.offsetTop) {
          sideMenu.classList.add("sticky");
        } else {
          sideMenu.classList.remove("sticky");
        }
      }
    }
  }
</script>

<style lang="scss">

  .about-me {
    position: relative;

    .side-menu {
      position: absolute;
      top: 1em;
      left: 1vh;
      width: 0;

      .side-menu-icon {
        font-size: 2.5em;
        margin-bottom: 3em;
      }

      &.sticky {
        position: fixed;
        top: 0;

        ul {
          padding-top: 1em;
        }
      }
    }
  }
</style>
