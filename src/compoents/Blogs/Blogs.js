import React from "react"
import "./Blogs.scss";
import {faQuoteLeft, faQuoteRight} from "@fortawesome/pro-duotone-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

export const Blogs = () => <div className="w-screen blogs">

    <section className="main w-screen text-center" id="blogs">
        <h2 className="text-4xl font-bold pb-12 text-white title-for-text">Recent blog posts</h2>

        <div className="grid-width grid-responsive">
            <div className="blog pl-5 pr-5 pt-5 flex items-center">
                <div>
            <span className="font-bold underline pb-5 text-2xl block">
                <a href="url" target="_blank">title</a>
                </span>

                    <span className="block font-bold">source, <span className="date">date</span>.</span>

                    <p className="pt-4 pb-8 text-left font-light leading-loose">
                        <FontAwesomeIcon className="icon fa-2x fa-pull-left" icon={faQuoteLeft} />
                        <span className="italic">intro</span>
                        <FontAwesomeIcon className="icon fa-2x fa-pull-right" icon={faQuoteRight}/>
                    </p>
                </div>

            </div>
        </div>

    </section>
</div>
