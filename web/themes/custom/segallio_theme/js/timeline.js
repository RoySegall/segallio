
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

        if (posts[key]['comments'] == undefined) {
          posts[key]['comments'] = 0;
        }

        if (posts[key]['likes'] == undefined) {
          posts[key]['likes'] = 0;
        }

        if (posts[key]['shares'] == undefined) {
          posts[key]['shares'] = 0;
        }
      });

      this.posts = posts;
    });
  },
  directives: {
    'social-icon': {
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
    },

    'media': {
      inserted: function(el, binding, vnode) {
        let text = [];
        binding.value.forEach(function(element, key) {
          let media = '';

          switch (element.type) {
            case 'image':
              media = '<img src="' + element.url + '" class="responsive-img" />';
          }

          text.push(media);
        });

        el.innerHTML = text.join("<br />");
      },
    },
  }
});
