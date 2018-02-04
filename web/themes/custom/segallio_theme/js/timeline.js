function postsMassage(element, key) {
  let class_name = function (key) {
    let delta = (key % 5) + 1;
    return 'demo-card demo-card--step' + delta;
  };

  element['className'] = class_name(key);

  if (element['asset'] !== undefined) {
    element['assets'] = element['asset'];
  }

  if (element['comments'] === undefined) {
    element['comments'] = 0;
  }

  if (element['likes'] === undefined) {
    element['likes'] = 0;
  }

  if (element['shares'] === undefined) {
    element['shares'] = 0;
  }

  if (element.entity_type === 'gist') {
    element.url = 'https://gist.github.com/' + element.unique_id;
    element.assets = element.files;
  }
}

app = new Vue({
  el: '#timeline',

  data: function () {
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

        posts.forEach(function (element, key) {
          postsMassage(element, key);
          self.posts.push(element);
        });

        self.page++;
        self.showLoadMore = true;
        self.showLoading = false;
      });
    }
  },
  created: function () {
    this.page = 0;
    this.showLoading = true;
    return this.$http.get(drupalSettings.entries_base).then((response) => {
      let posts = response.data;

      posts.forEach(function (element, key) {
        postsMassage(element, key);
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

          case 'gist':
          case 'event':
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
      inserted: function (el, binding, vnode) {
        let text = [];
        let assets = binding.value.assets;
        let entity_type = binding.value.entity_type;

        if (entity_type === 'gist') {
          console.log(assets);
        }
        else {
          assets.forEach(function (element, key) {

            // assets.forEach(function(element) {
            //   console.log(element);
            // });

            console.log(assets);
            let media = '';

            switch (element.type) {
              case 'image':
                media = '<img src="' + element.url + '" class="responsive-img" />';
            }

            text.push(media);
          });
        }

        el.innerHTML = text.join("<br />");
      },
    },
  }
});
