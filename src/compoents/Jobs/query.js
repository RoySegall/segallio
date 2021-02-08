import {graphql} from "gatsby";

export const query = graphql`
  {
    allMarkdownRemark(
        filter: {frontmatter: {type: {eq: "job"}}}, 
        sort: {fields: frontmatter___entry, order: ASC}
    ) {
      nodes {
        html
        frontmatter {
          name
          class
          years
          logo
          position
          url
          title
        }
      }
    },
    dreamed: file(relativePath: { eq: "dreamed-diabetes.png" }) {
      childImageSharp {
          fluid {
            src
          }
      }
    },
    gizra: file(relativePath: { eq: "gizra.png" }) {
      childImageSharp {
          fluid {
            src
          }
      }
    },
    rc: file(relativePath: { eq: "rc.png" }) {
      childImageSharp {
          fluid {
            src
          }
      }
    },
    taliaz: file(relativePath: { eq: "taliaz.png" }) {
      childImageSharp {
          fluid {
            src
          }
      }
    }
  }
`
