import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faQuoteLeft, faQuoteRight} from "@fortawesome/pro-duotone-svg-icons";
import React from "react";

export default ({blog}) => <div className="blog pl-5 pr-5 pt-5 flex items-center">
    <div>
        <span className="font-bold underline pb-5 text-2xl block">
            <a href={blog.frontmatter.url} rel="noreferrer" target="_blank">{blog.frontmatter.title}</a>
        </span>

        <span className="block font-bold">{blog.frontmatter.source}, <span className="date">{blog.frontmatter.date}</span>.</span>

        <p className="pt-4 pb-8 text-left font-light leading-loose">
            <FontAwesomeIcon className="icon fa-2x fa-pull-left" icon={faQuoteLeft}/>
            <span className="italic" dangerouslySetInnerHTML={{ __html: blog.html }}></span>
            <FontAwesomeIcon className="icon fa-2x fa-pull-right" icon={faQuoteRight}/>
        </p>
    </div>

</div>
