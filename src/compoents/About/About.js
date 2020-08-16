import React from "react"
import "./About.scss";
import {SideMenu} from "./SideMenu";
import Story from "./Story";
import SuperPowers from "./SuperPowers/SuperPowers";

export const About = () => <div className="about-me" id="about">
    <SideMenu />
    <Story/>
    <SuperPowers />
</div>
