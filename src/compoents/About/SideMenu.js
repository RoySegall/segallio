import React, {Component} from "react";
import "./SideMenu.scss";
import {faUserCircle, faLaptopCode, faBookReader, faCodeBranch, faMapMarked} from "@fortawesome/pro-duotone-svg-icons"
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"

export class SideMenu extends Component {

    constructor(props) {
        super(props);

        this.state = {
            links: [
                {icon: faUserCircle, section: '#about'},
                {icon: faLaptopCode, section: '#jobs'},
                {icon: faBookReader, section: '#blogs'},
                {icon: faCodeBranch, section: '#contributions'},
                {icon: faMapMarked, section: '#places'},
            ]
        };
    }

    componentDidMount() {
        window.addEventListener('scroll', this.handleScroll);
    }

    componentWillUnmount() {
        window.removeEventListener('scroll', this.handleScroll);
    }

    handleClick(event) {
        if (window.innerWidth >= 1024) {
            return;
        }

        event.preventDefault();

        const elementId = event.currentTarget
            .getAttribute('href')
            .replace('#', '');

        const targetPosition = document.getElementById(elementId);
        let menuHeight = 0;

        if (elementId !== 'about') {
            menuHeight = document.querySelector('.side-menu').clientHeight;
        }
        window.scroll({top: targetPosition.offsetTop - menuHeight});
    }

    handleScroll(event) {

        let aboutMe = document.querySelector(".about-me");
        let sideMenu = document.querySelector(".side-menu");

        if (window.pageYOffset > aboutMe.offsetTop) {
            sideMenu.classList.add("sticky");
        } else {
            sideMenu.classList.remove("sticky");
        }
    }

    link(link) {
        return <li>
            <a href={link.section} onClick={this.handleClick}>
                <FontAwesomeIcon icon={link.icon} className="side-menu-icon" />
            </a>
        </li>
    }

    render() {
        return <div className="side-menu">
            <ul>
                {this.state.links.map(link => this.link(link))}
            </ul>
        </div>
    }

}
