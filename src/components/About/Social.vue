<template>
  <ul class="flex justify-center m-2 icons">
    <li class="pl-3 pr-8" v-for="icon in icons">
      <a v-bind:href=icon.url target="_blank">
        <font-awesome-icon class="icon text-4xl" :icon="{ prefix: icon.prefix, iconName: icon.iconName }"/>
      </a>
    </li>
  </ul>
</template>

<script>
  export default {
    name: 'Social',
    data() {
      return {
        icons: [
          {
            url: 'https://www.facebook.com/RoySegall',
            prefix: 'fab',
            iconName: 'facebook-f'
          },
          {
            url: 'https://www.instagram.com/roysegall/',
            prefix: 'fab',
            iconName: 'instagram'
          },
          {
            url: 'https://www.twitter.com/RoySegall/',
            prefix: 'fab',
            iconName: 'twitter'
          },
          {
            url: 'https://www.github.com/RoySegall/',
            prefix: 'fab',
            iconName: 'github-alt'
          },
          {
            url: 'https://www.linkedin.com/in/roysegall/',
            prefix: 'fab',
            iconName: 'linkedin-in'
          },
        ]
      }
    },
  }
</script>

<style lang="scss">
  .icon {
    color: black;
    -webkit-transition: color .5s; /* Safari */
    transition: color .5s;

    &:hover {
      color: #f7b75e;

    }
  }
</style>
