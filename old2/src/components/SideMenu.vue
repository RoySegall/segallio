<template>
  <div class="side-menu">
    <ul>
      <li v-for="link in links">
        <a :href=link.section @click="handleClick">
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
      // return {links: [
      //     {icon: 'user-circle', section: '#about'},
      //     {icon: 'laptop-code', section: '#jobs'},
      //     {icon: 'book-reader', section: '#blogs'},
      //     {icon: 'code-branch', section: '#contributions'},
      //     {icon: 'map-marked', section: '#places'},
      // ]}
    },
    created() {
      window.addEventListener('scroll', this.handleScroll);
    },
    destroyed() {
      window.removeEventListener('scroll', this.handleScroll);
    },

    methods: {
      handleClick(event) {
        if (window.innerWidth >= 1024) {
          return;
        }

        event.preventDefault();

        const elementId = event.currentTarget
          .getAttribute('href')
          .replace('#', '');

        const targetPosition = document.getElementById(elementId);
        let menuHeight = 0;

        if (elementId !== 'about') {
          menuHeight = document.querySelector('.side-menu').clientHeight;
        }
        console.log(menuHeight);
        window.scroll({top: targetPosition.offsetTop - menuHeight});
      },
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

    @media(max-width: 1024px) {

      .side-menu  {
        background: white;
        top: 0;
        left: 0;
        width: 100vw;
        padding: 1em;
        margin: 0 auto;
        border-bottom: solid 1px black;

        ul {
          display: flex;
          justify-content: space-between;

          .side-menu-icon {
            padding: 0;
            margin: 0;
          }
        }
      }

      .side-menu.sticky {
        padding-top: 0;
      }
    }
  }
</style>
