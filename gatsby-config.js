/**
 * Configure your Gatsby site with this file.
 *
 * See: https://www.gatsbyjs.org/docs/gatsby-config/
 */

module.exports = {
    /* Your site config here */
    plugins: [
        'gatsby-plugin-postcss',
        'gatsby-plugin-sass',
        `gatsby-transformer-sharp`,
        `gatsby-plugin-sharp`,
        {
            resolve: `gatsby-source-filesystem`,
            options: {
                name: 'images',
                path: `${__dirname}/src/images`,
            },
        },
        {
            resolve: `gatsby-plugin-prefetch-google-fonts`,
            options: {
                fonts: [
                    {
                        family: `Rubik`,
                    },
                    {
                        family: `Open Sans`,
                    },
                    {
                        family: `Exo`,
                    },
                    {
                        family: `Caveat`,
                    },
                ],
            },
        }
    ],
}
