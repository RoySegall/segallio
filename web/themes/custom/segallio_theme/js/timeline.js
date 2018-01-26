
app = new Vue({
  el: '#timeline',
  data: {
    posts: [
      {type: 'facebook', 'text': 'This is a facebook post'},
      {type: 'github', 'text': 'This is a facebook post'},
      {type: 'instagram', 'text': 'This is a facebook post'},
      {type: 'twitter', 'text': 'This is a facebook post'},
    ],
  },
  computed: {
    classObject: function (index) {
      debugger;
      return "a";
    }
  }
});
