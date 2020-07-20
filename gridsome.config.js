// This is where project configuration and plugin options are located.
// Learn more: https://gridsome.org/docs/config

// Changes here require a server restart.
// To restart press CTRL + C in terminal and run `gridsome develop`

module.exports = {
  siteName: 'Segall.io',

  module: {
    rules: [
      // ... other rules omitted

      // this will apply to both plain `.scss` files
      // AND `<style lang="scss">` blocks in `.vue` files
      {
        test: /\.scss$/,
        use: [
          'vue-style-loader',
          'css-loader',
          'sass-loader'
        ]
      }
    ]
  },
  plugins: [
    {
      use: "gridsome-plugin-tailwindcss",
    },
    // {
    //   use: '@gridsome/source-filesystem',
    //   options: {
    //     path: 'content/posts/**/*.md',
    //     typeName: 'Post',
    //     route: '/blog/:slug'
    //   }
    // }
  ]
}
