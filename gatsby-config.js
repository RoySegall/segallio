/**
 * Configure your Gatsby site with this file.
 *
 * See: https://www.gatsbyjs.org/docs/gatsby-config/
 */

const fonts = ['Rubik', 'Open Sans', 'Caveat'];

require("dotenv").config({
    path: `.env.${process.env.NODE_ENV}`,
})

module.exports = {
    /* Your site config here */
    plugins: [
        'gatsby-plugin-postcss',
        'gatsby-plugin-sass',
        `gatsby-transformer-sharp`,
        `gatsby-plugin-sharp`,
        `gatsby-transformer-remark`,
        {
            resolve: `gatsby-source-filesystem`,
            options: {
                name: 'images',
                path: `${__dirname}/src/images`,
            },
        },
        {
            resolve: `gatsby-source-filesystem`,
            options: {
                name: 'markdown',
                path: `${__dirname}/src/markdowns`,
            },
        },
        {
            resolve: `gatsby-plugin-prefetch-google-fonts`,
            options: {
                fonts: fonts.map(font => {
                    return {
                        family: font,
                        "variants": [
                            "100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900",
                        ],
                        "subsets": [
                            "latin-ext"
                        ]
                    }
                }),
                "formats": [
                    "woff",
                    "woff2"
                ]
            },
        }
    ],
}
