import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import React from "react";

export const Technologies = ({selectedTechnology, setTechnologyCallback, technologies}) => {

    return <div className="grid grid-cols-12">
        <div className="col-span-2 xs:col-span-12 text-white text-left xs:text-center text-4xl xs:text-3xl sm:text-2xl md:text-2xl">
            Filter by:
        </div>
        <ul className="col-span-10 xs:col-span-12 flex justify-between filter text-white text-5xl">
            {technologies.map((technology, key) => {
                const selected = selectedTechnology === technology.name ? 'text-black' : '';
                return <li key={key} className={`xs:text-3xl sm:text-4xl md:text-4xl ${selected}`}>
                    <a className="cursor-pointer" onClick={setTechnologyCallback} data-technology={technology.name}>
                        <FontAwesomeIcon icon={technology.icon} />
                        <span className="block text-xs">{technology.name}</span>
                    </a>
                </li>
            })}
        </ul>
    </div>
}
