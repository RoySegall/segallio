import React from "react";
import "./Job.scss";
import {faChevronRight, faChevronLeft} from "@fortawesome/pro-duotone-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

export const Job = ({data, nextButton, prevButton, selectedPicture}) => {
    return <div className="job">

        <div className="job-display text-to-read">
            <a href={data.frontmatter.url} target="_blank"><img className="logo m-auto" src={selectedPicture} /></a>

            <div className="job-item">
                <a onClick={nextButton} className="cursor-pointer"><FontAwesomeIcon className="arrow text-5xl ml-2 active" icon={faChevronLeft} /></a>

                <div>
                    <h3 className="text-3xl font-bold">
                        {data.frontmatter.name}, {data.frontmatter.years}: {data.frontmatter.position}
                    </h3>

                    <p className="job-description description" dangerouslySetInnerHTML={{ __html: data.html }}></p>
                </div>

                <a onClick={prevButton} className="cursor-pointer"><FontAwesomeIcon className="arrow text-5xl ml-2" icon={faChevronRight} /></a>
            </div>

        </div>
    </div>
}
