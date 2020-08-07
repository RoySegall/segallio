import React from "react";
import "./Introduction.scss";
import { StaticQuery, graphql } from "gatsby"
import {Social} from "./Social";

const Introduction = ({data}) => {
    return <div className="introduction first-section">

        <h1 className="introduction-h1">Hello, I'm Roy Segall</h1>
        <p className="introduction-p">
            Enthusiastic, self-learned, highly
            motivated, love to explore new technologies
        </p>
        <p className="introduction-p">and contributing to open-source projects.</p>
        <img
            alt="Funny picture of mu self"
            src={data.file.childImageSharp.fluid.src} />

        <Social />
    </div>

}
export default () => (
    <StaticQuery
    query={graphql`
      {
        file(name: {eq: "introduction"}) {
          childImageSharp {
            fluid {
              src
            }
          }
        }
      }
    `}
    render={data => <Introduction data={data}/>}
    />
)

