
function postsMassage (element, key, posts) {
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
}

app = new Vue({
  el: '#timeline',

  data: function() {
    return {
      posts: [],
      showLoadMore: false,
      showLoading: false,
    };
  },

  methods: {
    loadMore: function () {
      let self = this;
      self.showLoadMore = false;
      self.showLoading = true;

      this.$http.get(drupalSettings.entries_base + '?page=' + this.page + 1).then((response) => {
        let posts = response.data;

        if (posts.length === 0) {
          // No posts. Skipping.
          self.showLoading = false;
          return;
        }

        posts.forEach(function(element, key) {
          postsMassage(element, key, posts);
          self.posts.push(element);
        });

        self.page++;
        self.showLoadMore = true;
        self.showLoading = false;
      });
    }
  },
  created: function() {
    this.page = 0;
    this.showLoading = true;
    return this.$http.get(drupalSettings.entries_base).then((response) => {
      let posts = response.data;

      posts.forEach(function(element, key) {
        postsMassage(element, key, posts);
      });

      this.posts = posts;
      this.showLoadMore = true;
      this.showLoading = false;
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
