
app = new Vue({
  el: '#timeline',
  data: {
    posts: [
      {type: 'facebook', 'text': 'This is a facebook post'},
      {type: 'github', 'text': 'This is a github post'},
      {type: 'instagram', 'text': 'This is a instagram post'},
      {type: 'twitter', 'text': 'This is a twitter post'},
      {type: 'facebook', 'text': 'This is a facebook post'},
    ],
  }
});

Vue.directive('social-icon', {
  bind: function (el, binding, vnode) {
    var s = JSON.stringify;
    el.innerHTML = "a";
  }
});
