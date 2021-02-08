import React from "react";
import "./Job.scss";
import {faChevronRight, faChevronLeft} from "@fortawesome/pro-duotone-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

export const Job = ({job, handleJobBrowsing, nextActive, selectedImage, prevActive}) => <div className="job">
    <div className="job-display text-to-read">
        <a href={job.frontmatter.url} target="_blank" rel="noreferrer">
            <img loading="lazy" className="logo m-auto" src={selectedImage} alt={`${job.frontmatter.name}'s logo`} />
        </a>

        <div className="job-item">
            <button onClick={handleJobBrowsing} className={`${prevActive ? "cursor-pointer" : null}`} data-browse='prev'>
                <FontAwesomeIcon className={`arrow text-5xl ml-2 ${prevActive ? 'active' : null}`} icon={faChevronLeft} />
            </button>

            <div>
                <h3 className="text-3xl font-bold">
                    {job.frontmatter.name}, {job.frontmatter.years}: {job.frontmatter.position}
                </h3>

                <div className="job-description description" dangerouslySetInnerHTML={{ __html: job.html }}>
                </div>
            </div>

            <button onClick={handleJobBrowsing} className={`${nextActive ? "cursor-pointer" : null}`} data-browse='next'>
                <FontAwesomeIcon className={`arrow text-5xl ml-2 ${nextActive ? 'active' : null}`} icon={faChevronRight} />
            </button>
        </div>

    </div>
</div>
