import React, {Component} from "react"
import { StaticQuery, graphql } from "gatsby"
import "./Contributions.scss";
import {Technologies} from "./Technologies";
import {Repositories} from "./Repositories";

const query = graphql`
      {
        allMarkdownRemark(filter: {frontmatter: {type: {eq: "contribution"}}}, limit: 9) {
          nodes {
            html
            frontmatter {
              title
              url
              position
              title
              technologies
            }
          }
        }
      }
    `

class Contributions extends Component {

    constructor(props) {
        super(props);

        this.state = {
            selectedTechnology: null
        };
    }

    setTechnology = (event) => {
        const technology = event.currentTarget.getAttribute('data-technology');
        const {selectedTechnology} = this.state;

        if (selectedTechnology && selectedTechnology === technology) {
            this.setState({selectedTechnology: null})
            return;
        }

        this.setState({selectedTechnology: technology})
    }

    render() {
        const {contributions} = this.props;

        return <div className="w-screen contributions" id="contributions">

            <section className="main w-screen text-center">
                <h2 className="text-4xl xs:text-2xl font-bold text-white pb-4 title-for-text">Contributions</h2>

                <div className="grid-width">
                    <Technologies selectedTechnology={this.state.selectedTechnology} setTechnologyCallback={this.setTechnology}/>
                    <Repositories contributions={contributions}/>
                </div>

            </section>
        </div>
    }
}

const contributions = () => (
    <StaticQuery
    query={query}
    render={data => <Contributions contributions={data.allMarkdownRemark.nodes}/>}
    />
)

export default contributions

