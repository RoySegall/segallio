import React from "react"
import "./Blogs.scss";
import {graphql, StaticQuery} from "gatsby"
import Blog from "./Blog";

const query = graphql`{
    allMarkdownRemark(
        filter: {frontmatter: {type: {eq: "blog"}}}, 
        sort: {fields: frontmatter___date, order: DESC}, 
        limit: 9
    ) {
        nodes {
            html
            frontmatter {
                title
                source
                url
                date
            }
        }
    }
}
`

const Blogs = ({blogs}) => <div className="w-screen blogs">
    <section className="main w-screen text-center" id="blogs">
        <h2 className="text-4xl font-bold pb-12 text-white title-for-text">Recent blog posts</h2>

        <div className="grid-width grid-responsive">
            {blogs.map((item, key) => <Blog blog={item} key={key}/>)}
        </div>

    </section>
</div>


const blogs = () => (
    <StaticQuery query={query} render={data => <Blogs blogs={data.allMarkdownRemark.nodes}/>} />
)

export default blogs
