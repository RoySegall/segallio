<template>
    <div class="side-menu">
        <ul>
            <li><font-awesome-icon class="side-menu-icon" :icon="['fad', 'user-circle']" /></li>
            <li><font-awesome-icon class="side-menu-icon" :icon="['fal', 'laptop-code']"/></li>
            <li><font-awesome-icon class="side-menu-icon" :icon="['fad', 'book-reader']"/></li>
            <li><font-awesome-icon class="side-menu-icon" :icon="['fad', 'brackets-curly']" /></li>
        </ul>
    </div>
</template>

<script>
  export default {
    name: "SideMenu",

    created () {
      window.addEventListener('scroll', this.handleScroll);
    },
    destroyed () {
      window.removeEventListener('scroll', this.handleScroll);
    },

    methods: {
      handleScroll (event) {
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
            top: 2em;
            left: 1vh;

            .side-menu-icon {
                font-size: 2.5em;
                margin-bottom: 3em;
            }

            &.sticky {
                position: fixed;
                top: 0;
                width: 100%;

                ul {
                    padding-top: 1em;
                }
            }
        }
    }
</style>
