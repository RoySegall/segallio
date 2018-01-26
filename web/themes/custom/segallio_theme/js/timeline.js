
app = new Vue({
  el: '#timeline',
  data: {
    posts: [
      {type: 'facebook', 'title': 'Post', 'text': 'This is a facebook post'},
      {type: 'github', 'title': 'Post', 'text': 'This is a github post'},
      {type: 'instagram','title': 'Post',  'text': 'This is a instagram post'},
      {type: 'twitter', 'text': 'This is a twitter post'},
      {type: 'facebook', 'text': 'This is a facebook post'},
    ],
  },

  directives: {
    'social-icon': {
      // directive definition.
      inserted: function (el, binding, vnode) {
        switch (binding.value) {
          case 'facebook':
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
