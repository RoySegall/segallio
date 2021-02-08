import {graphql, StaticQuery} from "gatsby";
import React from "react";

const query = graphql`
  {
    allMarkdownRemark(
        filter: {frontmatter: {type: {eq: "job"}}}, 
        sort: {fields: frontmatter___entry, order: ASC}
    ) {
      nodes {
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

export const Job = ({job, image}) => {

  const {name, years, position} = job.frontmatter;

  console.log(job.frontmatter);

  return <section>
    {/*<img loading="lazy" className="w-36" src={image} alt={`${job.frontmatter.name}'s logo`} />*/}
    <span>{name} {years} {position}</span>
  </section>
}

const Jobs = ({jobs, images}) => {
  return jobs.map((job, key) => <Job job={job} image={images[key]} key={key} />);
};

export default () => <StaticQuery
  query={query}
  render={data => <Jobs
    jobs={data.allMarkdownRemark.nodes}
    images={{
      0: data.dreamed.childImageSharp.fluid.src,
      1: data.taliaz.childImageSharp.fluid.src,
      2: data.rc.childImageSharp.fluid.src,
      3: data.gizra.childImageSharp.fluid.src,
    }}
  />}
/>
