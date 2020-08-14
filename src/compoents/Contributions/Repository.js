import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faGithubAlt} from "@fortawesome/free-brands-svg-icons";
import React from "react";

export const Repository = ({contribution}) => <div className="repository">
    <div className="grid grid-cols-12 items-center h-full">
        <div className="col-span-2 xs:col-span-12">
            <FontAwesomeIcon icon={faGithubAlt} className="side-menu-icon text-6xl"/>
        </div>
        <div className="col-span-10 xs:col-span-12 h-full">
            <div className="flex content-between flex-wrap h-full">
                <a target="_blank" className="text-2xl font-bold underline block w-full">
                    {contribution.frontmatter.title}
                </a>
                <p className="pt-2 font-light leading-loose" dangerouslySetInnerHTML={{ __html: contribution.html }}></p>

                <div className="pt-2">
                    <div className="inline">
                        Position: <span className="font-bold">{contribution.frontmatter.position}</span>,
                        Technologies:
                    </div>
                    <ul className="pl-2 technologies inline">
                        {contribution.frontmatter.technologies.map((technologies, key) =>
                            <li className="inline-block" key={key}>{technologies}</li>
                        )}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
