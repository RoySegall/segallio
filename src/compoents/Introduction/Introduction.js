import React from "react";
import "./Introduction.scss";
import { StaticQuery, graphql } from "gatsby"
import {Social} from "./Social";

const query = graphql`
      {
        file(name: {eq: "introduction"}) {
          childImageSharp {
            fluid {
              src
            }
          }
        }
      }
    `;

const Introduction = ({imageSrc}) => <div className="introduction first-section">
    <h1 className="introduction-h1">Hello, I'm Roy Segall</h1>
    <div className="introduction-p">
        <p>
            Enthusiastic, self-learned, highly
            motivated, love to explore new technologies
        </p>
        <p className="introduction-p">and contributing to open-source projects.</p>
    </div>

    <div className="pt-10">
        <img alt="Funny portrait of my self" loading="lazy" src={imageSrc} className="portrait" />
    </div>
    <Social />
</div>

export default () => (
    <StaticQuery query={query} render={data => <Introduction imageSrc={data.file.childImageSharp.fluid.src}/> } />
)
