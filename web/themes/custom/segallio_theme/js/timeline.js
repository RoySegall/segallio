
app = new Vue({
  el: '#timeline',

  data: function() {
    return {
      posts: [],
    };
  },
  created: function() {
    return this.$http.get(drupalSettings.entries_base).then((response) => {
      let posts = response.data;

      posts.forEach(function(element, key) {
        class_name = function(key) {
          let delta = (key % 5) + 1;
          return 'demo-card demo-card--step' + delta;
        };

        posts[key]['className'] = class_name(key);

        if (posts[key]['asset'] != undefined) {
          posts[key]['assets'] = posts[key]['asset'];
        }
      });

      this.posts = posts;
    });
  },
  directives: {
    'social-icon': {
      // directive definition.
      inserted: function (el, binding, vnode) {
        switch (binding.value) {
          case 'album':
          case 'picture':
          case 'status':
            el.innerHTML = "<i class='fab fa-facebook-f'></i>";
            break;

          case 'github':
            el.innerHTML = "<i class='fab fa-github-alt'></i>";
            break;

          case 'instagram':
            el.innerHTML = "<i class='fab fa-instagram'></i>";
            break;

          case 'twitter':
            el.innerHTML = "<i class='fab fa-twitter'></i>";
            break;
        }
      }
    }
  }
});
