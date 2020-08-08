import React from "react";
import "./Jobs.scss";
import {StaticQuery, graphql} from "gatsby"
import {Job} from "./Job";
import rc from "./rc.png";
import gizra from "./gizra.png";
import taliaz from "./taliaz.png";
import dreamed from "./dreamed-diabetes.png";

const query = graphql`
  {
    allMarkdownRemark(
        filter: {frontmatter: {type: {eq: "job"}}}, 
        sort: {fields: frontmatter___entry, order: DESC}
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
    }
  }
`

export class Jobs extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            selected: 0,
            images: {0: dreamed, 1: taliaz, 2: rc, 3: gizra},
        };
    }

    nextButton() {

    }

    prevButton() {

    }

    Jobs(data) {
        return <>
            <div className="jobs w-screen" id="jobs">
                <section className="jobs-section">
                    <h2 className="jobs-section-h2">Jobs</h2>

                    <Job
                        data={data.allMarkdownRemark.nodes[this.state.selected]}
                        nextButton={this.nextButton}
                        prevButton={this.prevButton}
                        selectedPicture={this.state.images[this.state.selected]}
                    />
                </section>
            </div>
            <section className="filler xs:hidden sm:hidden md:hidden"></section>
        </>
    }

    render() {
        return <StaticQuery
            query={query}
            render={data => this.Jobs(data)}
        />
    }
}

