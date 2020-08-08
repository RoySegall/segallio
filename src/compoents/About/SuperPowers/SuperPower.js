import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faStar as starFull} from "@fortawesome/pro-solid-svg-icons";
import {faStar as starEmpty} from "@fortawesome/pro-light-svg-icons";
import React from "react";
import StarIcon from "./StarIcon";

export default ({superpower}) => <li className="pt-2 flex justify-between">
    <div><span className="pr-3 text-xl">{superpower.name}</span></div>
    <div>
        {<StarIcon times={superpower.level}><FontAwesomeIcon className="star-full" icon={starFull} /></StarIcon>}
        {<StarIcon times={5-superpower.level}><FontAwesomeIcon className="star-empty" icon={starEmpty} /></StarIcon>}
    </div>
</li>
