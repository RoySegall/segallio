import React from "react"
import { StaticQuery, graphql } from "gatsby"
import './Pictures.scss';
import PicturesLabel from './pictures-label.yaml'


const query = graphql`
  {
    allFile(filter: {name: {in: ["polaroid-family", "polaroid-gizra", "polaroid-hasadna"]}}) {
      nodes {
        childImageSharp {
          fluid {
            src
          }
        }
      }
    }
  }
`

const Picture = ({item, index}) => {
    const Label = PicturesLabel.labels[index];
    return <li className="polaroid shadow-2xl">
        <img loading="lazy" src={item.childImageSharp.fluid.src} alt={Label} />
        <p className="hand-writing text-2xl">{Label}</p>
    </li>
}

const Pictures = ({pictures}) => <div className="images xs:hidden sm:hidden">
    <ul className="flex lg:items-center justify-between items-stretch pt-8">
        {pictures.map((item, key) => <Picture item={item} key={key} index={key} />)}
    </ul>
</div>

const PicturesWrapper = () => (
    <StaticQuery
        query={query}
        render={data => <Pictures pictures={data.allFile.nodes}/>}
    />
)

export default PicturesWrapper
