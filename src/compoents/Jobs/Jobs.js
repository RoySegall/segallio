import React from "react";
import "./Jobs.scss";
import {StaticQuery, graphql} from "gatsby"
import {Job} from "./Job";

const query = graphql`
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
class Jobs extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            selected: 0,
            images: props.images
        };
    }

    handleJobNavigation = (event) => {
        event.preventDefault();

        const {jobs} = this.props;
        const position = event.currentTarget.getAttribute('data-browse');
        let selected = this.state.selected;

        if (position === 'prev') {
            if (selected === jobs.length - 1) {
                return;
            }

            selected = selected + 1;

        } else {

            if (selected === 0) {
                return;
            }

            selected = selected - 1;
        }

        this.setState({selected})
    }

    render() {

        const {jobs} = this.props;
        const {selected, images} = this.state;

        return <>
            <div className="jobs w-screen" id="jobs">
                <section className="jobs-section">
                    <h2 className="jobs-section-h2">Jobs</h2>

                    <Job
                        job={jobs[selected]}
                        selectedImage={images[selected]}
                        handleJobBrowsing={this.handleJobNavigation}
                        nextActive={selected !== 0}
                        prevActive={selected + 1 !== jobs.length}
                    />
                </section>
            </div>
            <section className="filler xs:hidden sm:hidden md:hidden">
            </section>
        </>
    }
}


const jobs = () => <StaticQuery
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

export default jobs;
