import React from "react";
import "./Social.scss";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"
import {icons} from "./Icons";

const Icon = ({item}) => <li className="pl-3 pr-8">
    <a href={item.url} target="_blank" rel="noreferrer">
        <FontAwesomeIcon icon={item.iconName} className="icon text-4xl" />
    </a>
</li>

export const Social = () => <div className="block w-full pt-16 pb-2">
    <ul className="flex justify-center m-2 icons">
        {icons.map((item, index) => <Icon key={index} item={item} />)}
    </ul>
</div>

