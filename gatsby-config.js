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
        `gatsby-plugin-react-helmet`,
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
            resolve: `gatsby-plugin-google-analytics`,
            options: {
                trackingId: "UA-135079112-1",
            }
        },
        {
            resolve: `gatsby-plugin-webfonts`,
            options: {
                fonts: {
                    google: fonts.map(font => {
                        return {
                            family: font,
                            "variants": [
                                "100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap",
                            ],
                            "subsets": [
                                "latin-ext"
                            ]
                        }
                    }),

                },
                formatAgents: {
                    woff: `Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729; rv:11.0) like Gecko`,
                    woff2: `Mozilla/5.0 (Windows NT 10.0; Win64; x64; ServiceUI 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393`,
                }
            },
        }
    ],

    siteMetadata: {
        title: "Roy Segall",
        titleTemplate: "%s · Who am I?",
        description:
            "My personal site, stuff I did and what I love (beside Pizza!).",
        url: "https://segall.io", // No trailing slash allowed!
        twitterUsername: "@roysegall",
    },
}
