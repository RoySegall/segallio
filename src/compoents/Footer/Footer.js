import React from "react"
import "./Footer.scss";
import {faHeart} from "@fortawesome/pro-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";

export const Footer = () => <div className="footer text-center w-screen text-to-read pb-2 pt-4">
    Designed and made with <FontAwesomeIcon icon={faHeart} className="icon" /> by <b>Roy</b> and <b>Noy</b>
</div>
